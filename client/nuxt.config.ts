// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  app: {
    head: {
      htmlAttrs: {
        lang: 'ca',
      },
      meta: [
        { name: 'theme-color', content: '#006E50' },
      ],
      link: [
        {
          rel: 'icon',
          type: 'image/x-icon',
          href: 'https://compromis.net/sub/icons/favicon.ico',
        },
        {
          rel: 'icon',
          type: 'image/png',
          sizes: '32x32',
          href: 'https://compromis.net/sub/icons/favicon32.png',
        },
        {
          rel: 'icon',
          type: 'image/png',
          sizes: '192x192',
          href: 'https://compromis.net/sub/icons/favicon192.png',
        },
        {
          rel: 'stylesheet',
          href: 'https://compromis.net/sub/fonts/manrope.css?variable',
        }
      ],
    }
  },

  runtimeConfig: {
    public: {
      mapboxApiKey: '',
      reportsApiBase: ''
    }
  },

  css: ['~/assets/scss/main.scss'],

  modules: ["@nuxtjs/i18n", "@vueuse/nuxt"],

  vue: {
    defineModel: true,
    propsDestructure: true
  },

  i18n: {
    defaultLocale: 'val',
    locales: [
      { code: 'val', iso: 'ca', name: 'Valencià', file: 'val.js' },
      { code: 'cas', iso: 'es', name: 'Castellano', file: 'cas.js' }
    ],
    lazy: true,
    langDir: 'lang',
    baseUrl: 'https://quenotetiren.com'
  },

  vite: {
    css: {
      preprocessorOptions: {
        scss: {
          additionalData: `
            @import "@/assets/scss/_variables.scss";
            @import 'node_modules/include-media/dist/_include-media.scss';
          `
        }
      }
    }
  }
})