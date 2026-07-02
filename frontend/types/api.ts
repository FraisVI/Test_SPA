import type { AxiosInstance } from 'axios'

export interface User {
  id: number
  name: string
  email: string
}

export interface Product {
  id: number
  name: string
  description: string | null
  price: string
  is_favorite?: boolean
}

declare module '#app' {
  interface NuxtApp {
    $api: AxiosInstance
    $csrf: () => Promise<unknown>
  }
}

declare module 'vue' {
  interface ComponentCustomProperties {
    $api: AxiosInstance
    $csrf: () => Promise<unknown>
  }
}

export {}
