<template>
  <v-app>
    <v-toolbar color="blue-grey" dark fixed app clipped-left>
      <v-toolbar-title>LysZ210</v-toolbar-title>
    </v-toolbar>
    <v-content>
      <v-container fluid fill-height ma-0 pa-0>>
        <v-layout fill-height row>
          <iframe src="/cv" frameborder="0" style="width: 100%"></iframe>
        </v-layout>
      </v-container>
    </v-content>

    <v-footer color="blue-grey" class="white--text" app>
      <v-layout justify-center row wrap>
        <v-flex primary lighten-2 py-3 text-xs-center white--text xs12>
          &copy;2019 —
          <strong>Lingyong Sun</strong>
        </v-flex>
      </v-layout>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  data: () => ({
    drawer: null,
    drawerRight: null,
    right: false,
    left: false
  }),
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
