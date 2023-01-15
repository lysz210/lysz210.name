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
import { ajax } from 'rxjs/ajax'
import { mergeMap } from 'rxjs/operators'

export default {
  data: () => {
    return {
      socials: [],
    }
  },
  mounted() {
    ajax({
      url: "http://cv.lysz210.name.s3-website.eu-south-1.amazonaws.com/me/social-accounts.json",
      method: 'GET',
      crossDomain: true,
      withCredentials: false
    })
    .pipe(
      mergeMap(response => response?.response)
    )
    .subscribe({
      next: (element) => {
        this.socials.push(element)
      }
    })
  }
}
</script>