<template>
  <v-app>
    <v-toolbar color="blue-grey" dark fixed app clipped-left>
      <v-toolbar-title>LysZ210</v-toolbar-title>
      <v-spacer></v-spacer>
      <transition-group
        name="fade"
          @enter="enter"
      >
        <v-btn
          v-for="social in socials"
          :key="social.name"
          :href="social.url"
          icon
          target="_blank"
          color="white"
          style="opacity: 0"
        >
          <v-icon v-text="social.icon" :style="{color: social.color || 'black'}"></v-icon>
        </v-btn>
      </transition-group>
    </v-toolbar>
    <v-content>
      <router-view></router-view>
      <!-- <v-container fluid fill-height ma-0 pa-0>
        <v-layout fill-height row>
        </v-layout>
      </v-container> -->
    </v-content>

    <v-footer color="blue-grey">
      <v-layout justify-center row wrap>
        <v-flex text-xs-center white--text xs12>
          &copy;2019
          —
          <strong>Lingyong Sun</strong>
        </v-flex>
      </v-layout>
    </v-footer>
  </v-app>
</template>

<script>
import { from, asyncScheduler, interval, of, BehaviorSubject, Subject } from 'rxjs'
import { flatMap, delay, map, concatAll, delayWhen, tap, filter } from 'rxjs/operators'
import { ajax } from 'rxjs/ajax'
import router from '../router'
import Velocity from 'velocity-animate'

export default {
  router: router(),
  data: () => ({
    drawer: null,
    drawerRight: null,
    right: false,
    left: false,
    socials: [],
    pool: []
  }),
  mounted() {
    ajax.getJSON('/api/data/me/social-accounts')
    .subscribe(console.log, console.error, console.log.bind(console, 'done'))
    from(this.$axios.get('/api/data/me/social-accounts'), asyncScheduler).pipe(map(a => a.data))
      .subscribe(
        socialsData => {
          this.socials.push(socialsData.pop())
          this.pool.push(...socialsData)
        }
      )
  },
  methods: {
    enter (el, done) {
      Velocity(el, {opacity: 1}, {duration: 2000, complete: () => {
        if (this.pool.length)
          this.socials.push(this.pool.pop())
        done()
      }})
    }
  }
};
</script>
