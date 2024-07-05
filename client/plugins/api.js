import axios from 'axios'

class API {
  constructor (apiBase) {
    this.apiBase = apiBase
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
    axios.defaults.headers.common['X-XSRF-TOKEN'] = ''
  }

  submitReport (form) {
    return this._call('post', 'reports/submit', form)
  }

  legalFlats (city) {
    return this._call('get', 'tourist-flats/' + city)
  }

  cities () {
    return this._call('get', 'cities')
  }

  reports () {
    return this._call('get', 'reports')
  }

  _call (method, path, params) {
    return new Promise((resolve, reject) => {
      axios[method](this.apiBase + '/' + path, params).then((response) => {
        resolve(response.data)
      }).catch((error) => {
        reject(error.response.data)
      })
    })
  }
}

export default defineNuxtPlugin((nuxtApp) => {
  const config = useRuntimeConfig()

  nuxtApp.provide('api', new API(config.public.reportsApiBase))
})
