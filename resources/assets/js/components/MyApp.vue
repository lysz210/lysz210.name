<template>
  <v-app>
    <v-toolbar color="blue-grey" dark fixed app clipped-left>
      <v-toolbar-title>LysZ210</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn
        v-for="social in socials"
        :key="social.name"
        :href="social.url"
        icon
        target="_blank"
        color="white">
        <v-icon v-text="social.icon" :style="{color: social.color || 'black'}"></v-icon>
      </v-btn>
    </v-toolbar>
    <v-content>
      <v-container fluid fill-height ma-0 pa-0>
        <v-layout fill-height row>
          <iframe src="/cv" frameborder="0" style="width: 100%"></iframe>
        </v-layout>
      </v-container>
    </v-content>

    <v-footer color="blue-grey" class="white--text" app>
      <v-layout justify-center row wrap>
        <v-flex primary lighten-2 py-3 text-xs-center white--text xs12>
          &copy;2019
          —
          <strong>Lingyong Sun</strong>
        </v-flex>
      </v-layout>
    </v-footer>
  </v-app>
</template>

<script>
import { from, asyncScheduler, interval, of } from 'rxjs'
import { flatMap, delay, map, concatAll } from 'rxjs/operators'

export default {
  data: () => ({
    drawer: null,
    drawerRight: null,
    right: false,
    left: false,
    socials: []
  }),
  mounted() {
    console.log("Component mounted.");
    from(this.$axios.get('/storage/data/me/social-accounts.json'), asyncScheduler)
      .pipe(
        flatMap(response => response.data),
        map(item => of(item).pipe(delay(500))),
        concatAll()
      )
      .subscribe(
        socialData => this.socials.push(socialData)
      )
  }
};
</script>
