<template>
  <v-app>
    <v-app-bar app color="blue-grey" dark>
      <v-toolbar-title>Lysz210</v-toolbar-title>
      <v-spacer></v-spacer>
      <transition-group name="fade">
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
          :style="{ color: social.color || 'black' }"
        >{{ social.icon }}</v-icon>
      </v-btn>
      </transition-group>
    </v-app-bar>
    <v-main><slot></slot></v-main>
    <v-footer app color="blue-grey">
      <v-row justify="center">
        <v-col class="py-4 text-center white--text">
          &copy;2019 —
          <strong>Lingyong Sun</strong>
        </v-col>
      </v-row>
    </v-footer>
  </v-app>
</template>
<style>
html {
  overflow-y: auto;
}
</style>
<script>
import { of } from 'rxjs'
import { ajax } from 'rxjs/ajax'
import { mergeMap, concatMap, delay } from 'rxjs/operators'

export default {
  data: () => {
    const {
      public: {
        cvBasePath: basePath,
        meSocialAccounts: socialAccounts
      }
    } = useRuntimeConfig()
    return {
      cv: {
        basePath
      },
      me: {
        socialAccounts
      },
      socials: [],
    }
  },
  mounted() {
    ajax({
      url: `${this.cv.basePath}${this.me.socialAccounts}`,
      method: 'GET',
      crossDomain: true,
      withCredentials: false
    })
    .pipe(
      mergeMap(response => response?.response),
      concatMap(element => of(element).pipe(delay(700)))
    )
    .subscribe({
      next: (element) => {
        this.socials.push(element)
      }
    })
  }
}
</script>