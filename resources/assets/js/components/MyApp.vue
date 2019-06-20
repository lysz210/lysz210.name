<template>
<v-app>
	<v-navigation-drawer
        v-model="drawer"
		fixed
        clipped
		app
	>
		<v-list dense>
			<v-list-tile
                @click.stop="left = !left"
            >
                <v-list-tile-action>
                    <v-icon>exit_to_app</v-icon>
                </v-list-tile-action>
				<v-list-tile-content>
					<v-list-tile-title>hello</v-list-tile-title>
				</v-list-tile-content>
			</v-list-tile>
		</v-list>
	</v-navigation-drawer>
	<v-toolbar
		color="blue-grey"
		dark
		fixed
		app
		clipped-left
	>
        <v-toolbar-side-icon
            @click.stop="drawer = !drawer"
        ></v-toolbar-side-icon>
		<v-toolbar-title>LysZ210</v-toolbar-title>
	</v-toolbar>
    <v-navigation-drawer
      v-model="left"
      temporary
      fixed
    >hello</v-navigation-drawer>
    <v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
          <v-flex shrink>
            <v-tooltip right>
              <template v-slot:activator="{ on }">
                <v-btn href="/cv" icon large target="_blank" v-on="on">
                  <v-icon large>CV</v-icon>
                </v-btn>
              </template>
              <span>Source</span>
            </v-tooltip>
            <v-tooltip right>
              <template v-slot:activator="{ on }">
                <v-btn icon large href="https://codepen.io/johnjleider/pen/KQrPKJ" target="_blank" v-on="on">
                  <v-icon large>mdi-codepen</v-icon>
                </v-btn>
              </template>
              <span>Codepen</span>
            </v-tooltip>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>

    <v-footer color="blue-grey" class="white--text" app>
        <span>Lingyong Sun</span>
        <v-spacer></v-spacer>
        <span>&copy; 2019</span>
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
            console.log('Component mounted.')
        }
    }
</script>
