<script setup lang="ts">
const auth = useAuthStore()

onMounted(() => {
  auth.fetchUser()
})

const logout = async () => {
  await auth.logout()
  await navigateTo('/login')
}
</script>

<template>
  <div class="min-h-screen bg-slate-50 text-slate-900">
    <header class="border-b border-slate-200 bg-white">
      <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
        <NuxtLink to="/products" class="text-lg font-semibold">Favorites SPA</NuxtLink>

        <nav class="flex items-center gap-3 text-sm">
          <NuxtLink to="/products" class="rounded-md px-3 py-2 hover:bg-slate-100">Товары</NuxtLink>
          <NuxtLink to="/favorites" class="rounded-md px-3 py-2 hover:bg-slate-100">Избранное</NuxtLink>

          <template v-if="auth.isAuthenticated">
            <span class="hidden text-slate-500 sm:inline">{{ auth.user?.name }}</span>
            <button class="rounded-md bg-slate-900 px-3 py-2 text-white hover:bg-slate-700" type="button" @click="logout">
              Выйти
            </button>
          </template>

          <template v-else>
            <NuxtLink to="/login" class="rounded-md px-3 py-2 hover:bg-slate-100">Войти</NuxtLink>
            <NuxtLink to="/register" class="rounded-md bg-slate-900 px-3 py-2 text-white hover:bg-slate-700">Регистрация</NuxtLink>
          </template>
        </nav>
      </div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-8">
      <slot />
    </main>
  </div>
</template>
