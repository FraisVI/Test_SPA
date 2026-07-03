<script setup lang="ts">
const auth = useAuthStore()

const form = reactive({
  email: '',
  password: ''
})

const error = ref('')

const submit = async () => {
  error.value = ''

  try {
    await auth.login(form)
    await navigateTo('/products')
  } catch {
    error.value = 'Не удалось войти. Проверьте email и пароль.'
  }
}
</script>

<template>
  <section class="mx-auto max-w-md">
    <h1 class="mb-6 text-2xl font-semibold">Вход</h1>

    <form class="space-y-4 rounded-lg border border-slate-200 bg-white p-6" @submit.prevent="submit">
      <label class="block">
        <span class="mb-1 block text-sm font-medium">Email</span>
        <input v-model="form.email" class="w-full rounded-md border border-slate-300 px-3 py-2" required type="email">
      </label>

      <label class="block">
        <span class="mb-1 block text-sm font-medium">Пароль</span>
        <input v-model="form.password" class="w-full rounded-md border border-slate-300 px-3 py-2" required type="password">
      </label>

      <p v-if="error" class="text-sm text-red-600">{{ error }}</p>

      <button class="w-full rounded-md bg-slate-900 px-4 py-2 text-white hover:bg-slate-700" :disabled="auth.loading" type="submit">
        Войти
      </button>
    </form>
  </section>
</template>
