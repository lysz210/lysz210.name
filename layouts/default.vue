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
    <v-main><v-container><slot></slot></v-container></v-main>
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