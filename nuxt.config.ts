// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },

  css: [
    '~/assets/css/main.css',
    '@fortawesome/fontawesome-svg-core/styles.css'
  ],

  plugins: [
    '~/plugins/fontawesome.js'
  ],

  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },

  modules: ['@nuxt/eslint'],

  build: {
    transpile: [
      "@fortawesome/vue-fontawesome"
    ]
  },

  compatibilityDate: '2024-10-08',
});