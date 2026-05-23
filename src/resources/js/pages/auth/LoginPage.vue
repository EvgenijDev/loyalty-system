<template>
  <div class="min-h-screen bg-slate-950 text-slate-900">
    <div class="mx-auto flex min-h-screen max-w-md flex-col justify-center px-4 py-8">
      <div class="rounded-[2rem] bg-white/95 p-6 shadow-[0_35px_60px_-15px_rgba(15,23,42,0.4)] backdrop-blur-sm">
        <div class="mb-8 text-center">
          <h1 class="text-3xl font-semibold text-slate-900">Log in</h1>
          <p class="mt-2 text-sm text-slate-500">Введите свои данные, чтобы продолжить</p>
        </div>

        <label class="mb-3 block text-sm font-medium text-slate-700" for="email">Email</label>
        <input
          id="email"
          v-model="email"
          type="email"
          placeholder="ivanov@mail.ru"
          class="mb-6 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 text-base text-slate-900 outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100"
        />

        <label class="mb-3 block text-sm font-medium text-slate-700" for="password">Пароль</label>
        <div class="relative mb-4">
          <input
            id="password"
            v-model="password"
            type="password"
            placeholder="******"
            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 pr-12 text-base text-slate-900 outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100"
          />
          <span class="absolute inset-y-0 right-4 flex items-center text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
              <circle cx="12" cy="12" r="3"></circle>
            </svg>
          </span>
        </div>

        <button class="mb-4 text-left text-sm font-medium text-slate-500 hover:text-slate-700" type="button">Забыли логин или пароль</button>

        <button
          class="mb-6 w-full rounded-[1.5rem] bg-gradient-to-r from-blue-500 to-indigo-500 px-6 py-4 text-lg font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:from-blue-600 hover:to-indigo-600"
          type="button"
          @click="showModal = true"
        >
          Войти
        </button>

        <p class="text-center text-sm text-slate-500">
          Нет аккаунта?
          <button type="button" class="font-semibold text-slate-900 hover:text-blue-600" @click="gotoRegister">Зарегистрироваться</button>
        </p>
      </div>
    </div>

    <div
      v-if="showModal"
      class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/70 px-4 py-8"
    >
      <div class="w-full max-w-md rounded-[2rem] bg-white p-6 shadow-2xl">
        <div class="mb-6 flex items-center justify-between">
          <div>
            <h2 class="text-2xl font-semibold text-slate-900">Добро пожаловать</h2>
            <p class="text-sm text-slate-500">Вы успешно вошли в систему</p>
          </div>
          <button @click="showModal = false" class="text-slate-400 hover:text-slate-700">✕</button>
        </div>
        <div class="rounded-3xl bg-slate-50 p-5 text-center">
          <p class="text-base font-medium text-slate-700">Ваши данные приняты.</p>
          <p class="mt-4 text-sm text-slate-500">Закройте это окно, чтобы перейти к следующему шагу.</p>
        </div>
        <button
          @click="showModal = false"
          class="mt-6 w-full rounded-[1.5rem] bg-blue-500 px-5 py-4 text-base font-semibold text-white transition hover:bg-blue-600"
        >
          Продолжить
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const email = ref('')
const password = ref('')
const showModal = ref(false)

const gotoRegister = () => {
  router.push({ name: 'register' })
}
</script>