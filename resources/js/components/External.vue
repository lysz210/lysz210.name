<template>
  <v-container fluid fill-height ma-0 pa-0>
    <v-layout row align-center justify-center>
      <v-flex xs12 grow fill-height>
        <iframe
          style="width: 100%; height: 100%"
        ref="externalWindow" :src="src" frameborder="0"></iframe>
        <v-speed-dial
          v-model="fab"
          :bottom="true"
          :top="false"
          :right="true"
          :left="false"
          :direction="'top'"
          style="position: fixed"
        >
          <template v-slot:activator>
            <v-btn v-model="fab" color="blue darken-2" dark fab>
              <v-icon v-if="fab">fa-times</v-icon>
              <v-icon v-else>fa-ellipsis-v</v-icon>
            </v-btn>
          </template>
          <v-btn fab dark small color="green" :href="pdfSrc" target="_blank">
            <v-icon>fa-print</v-icon>
          </v-btn>
          <v-btn fab dark small color="indigo" :disabled="true">
            <v-icon>fa-envelope</v-icon>
          </v-btn>
        </v-speed-dial>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  props: {
    lang: {
      type: String,
      default: "/en"
    }
  },
  data() {
    return {
      fab: false
    };
  },
  computed: {
      src() {
          return `${this.lang}/cv`
      },
      pdfSrc () {
          return `${this.src}/pdf`
      }
  }
};
</script>
