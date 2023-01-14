// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    app: {
        head: {
            title: 'Lysz210'
        }
    },
    vite: {
        ssr: {
            noExternal: ['vuetify']
        }
    }
})