// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    ssr: false,
    app: {
        head: {
            title: 'Lysz210'
        }
    },
    vite: {
        ssr: {
            noExternal: ['vuetify']
        }
    },
    generate: {
        routes: [ '/en', '/it' ]
    }
})
