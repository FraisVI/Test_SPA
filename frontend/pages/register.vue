<script setup lang="ts">
const auth = useAuthStore()

const form = reactive({
  name: '',
  email: '',
  password: '',
  password_confirmation: ''
})

const error = ref('')

const submit = async () => {
  error.value = ''

  try {
    await auth.register(form)
    await navigateTo('/products')
  } catch {
    error.value = 'Не удалось зарегистрироваться. Проверьте данные формы.'
  }
}
</script>

<template>
  <section class="mx-auto max-w-md">
    <h1 class="mb-6 text-2xl font-semibold">Регистрация</h1>

    <form class="space-y-4 rounded-lg border border-slate-200 bg-white p-6" @submit.prevent="submit">
      <label class="block">
        <span class="mb-1 block text-sm font-medium">Имя</span>
        <input v-model="form.name" class="w-full rounded-md border border-slate-300 px-3 py-2" required type="text">
      </label>

      <label class="block">
        <span class="mb-1 block text-sm font-medium">Email</span>
        <input v-model="form.email" class="w-full rounded-md border border-slate-300 px-3 py-2" required type="email">
      </label>

      <label class="block">
        <span class="mb-1 block text-sm font-medium">Пароль</span>
        <input v-model="form.password" class="w-full rounded-md border border-slate-300 px-3 py-2" required type="password">
      </label>

      <label class="block">
        <span class="mb-1 block text-sm font-medium">Повтор пароля</span>
        <input v-model="form.password_confirmation" class="w-full rounded-md border border-slate-300 px-3 py-2" required type="password">
      </label>

      <p v-if="error" class="text-sm text-red-600">{{ error }}</p>

      <button class="w-full rounded-md bg-slate-900 px-4 py-2 text-white hover:bg-slate-700" :disabled="auth.loading" type="submit">
        Зарегистрироваться
      </button>
    </form>
  </section>
</template>
