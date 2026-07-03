<script setup lang="ts">
import type { Product } from '~/types/api'

const auth = useAuthStore()
const products = useProductsStore()

onMounted(async () => {
  await auth.fetchUser()
  await products.fetchProducts()
})

const toggleFavorite = async (product: Product) => {
  if (!auth.isAuthenticated) {
    await navigateTo('/login')
    return
  }

  if (product.is_favorite) {
    await products.removeFromFavorites(product)
    return
  }

  await products.addToFavorites(product)
}
</script>

<template>
  <section>
    <div class="mb-6 flex items-center justify-between">
      <h1 class="text-2xl font-semibold">Товары</h1>
      <span class="text-sm text-slate-500">{{ products.items.length }} товаров</span>
    </div>

    <div v-if="products.loading" class="text-slate-500">Загрузка...</div>

    <div v-else class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
      <article v-for="product in products.items" :key="product.id" class="rounded-lg border border-slate-200 bg-white p-5">
        <h2 class="mb-2 text-lg font-semibold">{{ product.name }}</h2>
        <p class="mb-4 min-h-12 text-sm text-slate-600">{{ product.description }}</p>

        <div class="flex items-center justify-between gap-4">
          <span class="font-semibold">{{ product.price }} ₽</span>
          <button
            class="rounded-md px-3 py-2 text-sm"
            :class="product.is_favorite ? 'bg-red-50 text-red-700 hover:bg-red-100' : 'bg-slate-900 text-white hover:bg-slate-700'"
            type="button"
            @click="toggleFavorite(product)"
          >
            {{ product.is_favorite ? 'Убрать' : 'В избранное' }}
          </button>
        </div>
      </article>
    </div>
  </section>
</template>
