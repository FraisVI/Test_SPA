import { defineStore } from 'pinia'
import type { Product } from '~/types/api'

interface FavoritesState {
  items: Product[]
  loading: boolean
}

export const useFavoritesStore = defineStore('favorites', {
  state: (): FavoritesState => ({
    items: [],
    loading: false
  }),

  actions: {
    async fetchFavorites() {
      const { $api } = useNuxtApp()

      this.loading = true

      try {
        const { data } = await $api.get<{ data: Product[] }>('/me/favorites')
        this.items = data.data
      } finally {
        this.loading = false
      }
    },

    async removeFromFavorites(product: Product) {
      const { $api } = useNuxtApp()

      await $api.delete(`/favorites/${product.id}`)
      this.items = this.items.filter((item) => item.id !== product.id)
    }
  }
})
