<template>
  <v-layout full-height>
    <v-card class="h-100 w-100">
      <iframe
        style="width: 100%; height: 100%"
        ref="externalWindow" :src="src" frameborder="0"></iframe>
        <v-btn
          :href="pdfSrc" target="_blank"
          icon="fas fa-print"
          dark color="green"
          position="absolute"
          elevation="12"
          class="print-btn"
        ></v-btn>
    </v-card>
  </v-layout>
</template>
<style>
.print-btn {
  bottom: 16px;
  right: 32px;
}
</style>
  
<script>
  export default {
    data() {
      return {
        fab: false
      };
    },
    computed: {
        lang() {
            console.log(this)
            return this.$route?.params?.lang || 'en'
        },
        src() {
            return `http://cv.lysz210.name.s3-website.eu-south-1.amazonaws.com/${this.lang}`
        },
        pdfSrc () {
            return `${this.src}/CV_lingyong_sun.pdf`
        }
    }
  };
</script>
  