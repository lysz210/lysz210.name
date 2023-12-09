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
            cvBasePath: 'http://cv.lysz210.name.s3-website.eu-south-1.amazonaws.com',
            cvPdf: '/CV_lingyong_sun.pdf',
            meSocialAccounts: '/me/social-accounts.json'
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
