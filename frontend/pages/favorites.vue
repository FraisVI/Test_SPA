<script setup lang="ts">
const auth = useAuthStore()
const favorites = useFavoritesStore()

onMounted(async () => {
  await auth.fetchUser()

  if (!auth.isAuthenticated) {
    await navigateTo('/login')
    return
  }

  await favorites.fetchFavorites()
})
</script>

<template>
  <section>
    <div class="mb-6 flex items-center justify-between">
      <h1 class="text-2xl font-semibold">Избранное</h1>
      <span class="text-sm text-slate-500">{{ favorites.items.length }} товаров</span>
    </div>

    <div v-if="favorites.loading" class="text-slate-500">Загрузка...</div>

    <div v-else-if="favorites.items.length === 0" class="rounded-lg border border-slate-200 bg-white p-8 text-center text-slate-500">
      В избранном пока нет товаров.
    </div>

    <div v-else class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
      <article v-for="product in favorites.items" :key="product.id" class="rounded-lg border border-slate-200 bg-white p-5">
        <h2 class="mb-2 text-lg font-semibold">{{ product.name }}</h2>
        <p class="mb-4 min-h-12 text-sm text-slate-600">{{ product.description }}</p>

        <div class="flex items-center justify-between gap-4">
          <span class="font-semibold">{{ product.price }} ₽</span>
          <button class="rounded-md bg-red-50 px-3 py-2 text-sm text-red-700 hover:bg-red-100" type="button" @click="favorites.removeFromFavorites(product)">
            Убрать
          </button>
        </div>
      </article>
    </div>
  </section>
</template>
