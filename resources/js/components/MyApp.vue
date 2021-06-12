<template>
  <v-app>
    <v-app-bar app color="blue-grey" dark>
      <v-toolbar-title>Lysz210</v-toolbar-title>
      <v-spacer></v-spacer>
      <transition-group name="fade" @enter="enter">
        <v-btn
          v-for="social in socials"
          :key="social.name"
          :href="social.url"
          icon
          small
          target="_blank"
          style="background-color: white; margin: .3rem"
        >
          <v-icon
            v-text="social.icon"
            :style="{ color: social.color || 'black' }"
          ></v-icon>
        </v-btn>
      </transition-group>
    </v-app-bar>
    <!-- <v-toolbar color="blue-grey" dark fixed app clipped-left>
    </v-toolbar> -->
    <v-main>
      <router-view></router-view>
    </v-main>
    <v-footer color="blue-grey">
      <v-row justify="center">
        <v-col class="py-4 text-center white--text">
          &copy;2019 —
          <strong>Lingyong Sun</strong>
        </v-col>
      </v-row>
    </v-footer>
  </v-app>
</template>

<script>
import { ajax } from "rxjs/ajax";
import router from "../router";
import Velocity from "velocity-animate";
import Vuetify from "vuetify";

export default {
  router: router(),
  vuetify: new Vuetify(),
  data: () => ({
    drawer: null,
    drawerRight: null,
    right: false,
    left: false,
    socials: [],
    pool: [],
  }),
  mounted() {
    ajax.getJSON("/api/data/me/social-accounts").subscribe({
      next: (socialsData) => {
        console.log(socialsData);
        this.socials.push(socialsData.pop());
        this.pool.push(...socialsData);
      },
      complete: console.log.bind(console, "get(social-acocunts) done!"),
    });
  },
  methods: {
    enter(el, done) {
      Velocity(
        el,
        { opacity: 1 },
        {
          duration: 2000,
          complete: () => {
            if (this.pool.length) this.socials.push(this.pool.pop());
            done();
          },
        }
      );
    },
  },
};
</script>
