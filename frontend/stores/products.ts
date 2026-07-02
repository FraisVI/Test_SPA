import { defineStore } from 'pinia'
import type { Product } from '~/types/api'

interface ProductsState {
  items: Product[]
  loading: boolean
}

export const useProductsStore = defineStore('products', {
  state: (): ProductsState => ({
    items: [],
    loading: false
  }),

  actions: {
    async fetchProducts() {
      const { $api } = useNuxtApp()

      this.loading = true

      try {
        const { data } = await $api.get<{ data: Product[] }>('/products')
        this.items = data.data
      } finally {
        this.loading = false
      }
    },

    async addToFavorites(product: Product) {
      const { $api } = useNuxtApp()

      await $api.post(`/favorites/${product.id}`)
      product.is_favorite = true
    },

    async removeFromFavorites(product: Product) {
      const { $api } = useNuxtApp()

      await $api.delete(`/favorites/${product.id}`)
      product.is_favorite = false
    }
  }
})
