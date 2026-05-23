<template>
    <div
        class="relative min-h-screen bg-cover bg-center bg-gray-900"
        :style="{
            backgroundImage: `url(${logIN})`
        }"
    >
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/50"></div>

        <!-- Main Content Flow -->
        <div class="relative z-10 flex flex-col justify-start px-6 pt-100 space-y-12">
            <!-- Logo -->
            <div class="logo-white">
                <Logo />
            </div>

            <!-- Main Text -->
            <div class="mb-86 mt-126">
                <h1 class="text-white text-4xl md:text-5xl font-light leading-tight">
                    Вступайте в клуб
                    <br>
                    <span class="font-semibold">LAUFEN</span>
                </h1>
            </div>

            <!-- Button -->
            <Button
                @click="showAuthPanel = true"
                text="Войти"
            >
                
            </Button>

            <!-- Register Link -->
            <button
                @click.prevent="goToRegister"
                class="text-gray-300 hover:text-white text-sm md:text-base transition-colors duration-200"
            >
                Нет аккаунта? <span class="underline">Зарегистрироваться</span>
            </button>
        </div>
    </div>

    <!-- Auth Panel (остаётся без изменений) -->
    <div v-if="showAuthPanel" class="fixed inset-0 z-40 flex items-end justify-center bg-black/40 px-4 py-6">
        <div class="w-full max-w-3xl rounded-t-3xl bg-white p-6 shadow-2xl sm:p-8 h-[50vh] overflow-y-auto">
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.2em] text-slate-400">Авторизация</p>
                    <h2 class="mt-2 text-2xl font-semibold text-slate-900">Войдите в свой аккаунт</h2>
                </div>
                <button @click="showAuthPanel = false" class="text-slate-400 transition hover:text-slate-700">✕</button>
            </div>

            <div class="space-y-5">
                <label class="block text-sm font-medium text-slate-700">Email</label>
                <input
                    v-model="loginEmail"
                    type="email"
                    placeholder="ivanov@mail.ru"
                    class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-4 text-base text-slate-900 outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100"
                />

                <label class="block text-sm font-medium text-slate-700">Пароль</label>
                <input
                    v-model="loginPassword"
                    type="password"
                    placeholder="******"
                    class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-4 text-base text-slate-900 outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100"
                />
                <Button
                    text="Войти"
                >
                </Button>

                <button type="button" class="text-left text-sm font-medium text-slate-500 hover:text-slate-700">
                    Забыли логин или пароль?
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import logIN from '@/assets/images/logIN.png'
import Logo from '@/components/Logo.vue'
import Button from '@/components/Button.vue'

const router = useRouter()
const showAuthPanel = ref(false)
const loginEmail = ref('')
const loginPassword = ref('')

const goToRegister = () => {
    router.push({ name: 'register' })
}
</script>

<style>
.logo-white svg, .logo-white img, .logo-white {
    filter: brightness(100%) !important;
    color: white !important;
}
</style>