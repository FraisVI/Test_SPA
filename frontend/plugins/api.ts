import axios from 'axios'

export default defineNuxtPlugin(() => {
  const config = useRuntimeConfig()
  const apiBase = config.public.apiBase
  const baseURL = String(apiBase)
  const origin = new URL(baseURL).origin

  const api = axios.create({
    baseURL,
    withCredentials: true,
    withXSRFToken: true,
    headers: {
      Accept: 'application/json'
    }
  })

  const csrf = () => api.get('/sanctum/csrf-cookie', { baseURL: origin })

  return {
    provide: {
      api,
      csrf
    }
  }
})
