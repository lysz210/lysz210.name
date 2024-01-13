// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    ssr: false,
    app: {
        head: {
            title: 'Lysz210'
        }
    },
    runtimeConfig: {
        public: {
            cvBasePath: 'https://cv.lysz210.name',
            cvPdf: '/CV_lingyong_sun.pdf',
            meSocialAccounts: '/api/me/social-accounts'
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
