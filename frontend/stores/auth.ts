import { defineStore } from 'pinia'
import type { User } from '~/types/api'

interface LoginPayload {
  email: string
  password: string
}

interface RegisterPayload extends LoginPayload {
  name: string
  password_confirmation: string
}

interface AuthState {
  user: User | null
  loading: boolean
}

export const useAuthStore = defineStore('auth', {
  state: (): AuthState => ({
    user: null,
    loading: false
  }),

  getters: {
    isAuthenticated: (state) => Boolean(state.user)
  },

  actions: {
    async fetchUser() {
      const { $api } = useNuxtApp()

      try {
        const { data } = await $api.get<{ user: User }>('/user')
        this.user = data.user
      } catch {
        this.user = null
      }
    },

    async login(payload: LoginPayload) {
      const { $api, $csrf } = useNuxtApp()

      this.loading = true

      try {
        await $csrf()
        const { data } = await $api.post<{ user: User }>('/login', payload)
        this.user = data.user
      } finally {
        this.loading = false
      }
    },

    async register(payload: RegisterPayload) {
      const { $api, $csrf } = useNuxtApp()

      this.loading = true

      try {
        await $csrf()
        const { data } = await $api.post<{ user: User }>('/register', payload)
        this.user = data.user
      } finally {
        this.loading = false
      }
    },

    async logout() {
      const { $api } = useNuxtApp()

      await $api.post('/logout')
      this.user = null
    }
  }
})
