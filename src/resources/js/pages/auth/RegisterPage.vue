<template>
    <div>
        <div
            v-if="!showCodeScreen"
            class="min-h-screen bg-slate-950 text-slate-900"
        >
            <div class="mx-auto flex min-h-screen flex-col px-4 py-8">
                <div
                    class="overflow-hidden rounded-[2rem] shadow-[0_35px_60px_-15px_rgba(15,23,42,0.25)] backdrop-blur-2xl"
                    :style="{
                        backgroundImage: `url(${BG})`,
                        backgroundSize: 'cover',
                        backgroundPosition: 'center'
                    }"
                >
                    <div class="px-6 pb-6 pt-8 sm:px-8">
                        <div class="mb-8">
                            <Logo />
                        </div>

                        <div class="space-y-4 border-b border-slate-200 pb-6">
                            <p
                                class="text-[40px] font-normal leading-normal tracking-normal mb-1"
                            >
                                Заполните форму и станьте участником бонусного
                                сервиса
                            </p>
                        </div>

                        <div class="mt-6 space-y-5">
                            <div class="mt-20">
                                <label
                                    class="text-[40px] mb-2 block text-sm font-semibold text-slate-800"
                                    >Имя Фамилия</label
                                >
                                <input
                                    v-model="fullName"
                                    type="text"
                                    placeholder="Иван Иванов"
                                    class="text-[40px] w-full px-4 py-3 text-gray-500 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                />
                            </div>

                            <div class="mt-20">
                                <label
                                    class="text-[40px] mb-2 block text-sm font-semibold text-slate-800"
                                    >Email</label
                                >
                                <input
                                    v-model="email"
                                    type="email"
                                    placeholder="ivanov@mail.ru"
                                    class="text-[40px] w-full px-4 py-3 text-gray-500 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                />
                            </div>

                            <div class="mt-20">
                                <label
                                    class="text-[40px] mb-2 block text-sm font-semibold text-slate-800"
                                    >Телефон</label
                                >
                                <input
                                    type="text"
                                    class="text-[40px] w-full px-4 py-3 text-gray-500 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                    placeholder=""
                                />
                            </div>

                            <div class="mt-20">
                                <label
                                    class="mb-2 block text-sm font-semibold text-slate-800"
                                    >Род занятий</label
                                >
                                <select
                                    v-model="occupation"
                                    class="text-[40px] w-full px-4 py-3 text-gray-500 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                >
                                    <option>Дизайнер</option>
                                    <option>Маркетолог</option>
                                    <option>Разработчик</option>
                                    <option>Менеджер</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-8 space-y-4 px-1 pb-8">
                            <button
                                type="button"
                                @click="getCodeByEmail"
                                class="w-full rounded-[1.75rem] bg-gradient-to-r from-blue-500 to-indigo-500 px-6 py-4 text-lg font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:from-blue-600 hover:to-indigo-600"
                            >
                                Далее
                            </button>

                            <button
                                type="button"
                                class="w-full rounded-[1.75rem] border border-slate-200 bg-white px-6 py-4 text-lg font-semibold text-slate-700 transition hover:bg-slate-50"
                                @click="goBack"
                            >
                                Отмена
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <div class="mb-6 border-b border-slate-100 pb-4">
                <div class="flex items-center gap-2 text-slate-800">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-blue-500"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M10 2a8 8 0 00-8 8c0 3.314 2.686 6 6 6a6 6 0 003.5-1.063l2.79 1.503a.75.75 0 001.077-.798l-.708-3.03A6 6 0 0018 10a8 8 0 00-8-8z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <span class="text-sm font-medium text-slate-500"
                        >Подтверждение</span
                    >
                </div>
            </div>

            <!-- центральный блок с сообщением "На ваш номер была отправлена СМС с кодом подтверждения" -->
            <div class="my-2 text-center">
                <div
                    class="inline-flex items-center justify-center rounded-full bg-blue-50 p-3 mb-3"
                >
                    <svg
                        class="w-8 h-8 text-blue-500"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M12 18v.01M8 7a4 4 0 118 0m-4 7a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                        ></path>
                    </svg>
                </div>
                <p class="text-slate-700 text-base font-medium">
                    На вашу почту было отправлено сообщение
                </p>
                <p class="text-slate-500 text-sm mt-1">с кодом подтверждения</p>
                <div
                    class="mt-2 text-xs text-slate-400 bg-slate-50 inline-block px-3 py-1 rounded-full"
                >
                    {{ maskedPhone }}
                </div>
            </div>

            <div class="mt-5">
                <label
                    class="mb-2 block text-sm font-semibold text-slate-700 text-center"
                    >Введите код</label
                >
                <div class="flex flex-col items-center">
                    <input
                        v-model="verificationCode"
                        type="text"
                        :class="[
                            'code-digit w-48 sm:w-56 text-center text-2xl tracking-[0.3em] font-mono font-semibold py-3 outline-none transition border-b-2 bg-transparent',
                            codeError
                                ? 'border-red-500 text-red-700 focus:border-red-600'
                                : 'border-slate-300 focus:border-blue-500'
                        ]"
                        maxlength="6"
                        placeholder="—— ——"
                    />
                    <div
                        v-if="codeError"
                        class="mt-2 text-center text-sm text-red-600"
                    >
                        {{ codeError }}
                    </div>
                </div>
                <!-- подсказка (имитация примера: "1" как на картинке, но для удобства) -->
                <p class="text-center text-xs text-slate-400 mt-2">
                    Код: 6 цифр
                </p>
            </div>

            <!-- Кнопки согласно макету: Отправить снова, Стать участником, Отмена -->
            <div class="mt-8 space-y-3 px-1 pb-6 sm:pb-8">
                <button
                    type="button"
                    @click="resendCode"
                    :disabled="resendDisabled"
                    class="w-full rounded-[1.75rem] border border-slate-200 bg-white px-6 py-3.5 text-base font-semibold text-slate-700 transition hover:bg-slate-50 disabled:opacity-50 disabled:cursor-not-allowed active:scale-[0.98]"
                >
                    Отправить снова
                    <span
                        v-if="resendTimer > 0"
                        class="text-sm font-normal text-slate-400 ml-1"
                        >({{ resendTimer }}с)</span
                    >
                </button>

                <Button @click="submitRegistration" text="Стать участником">
                </Button>

                <button
                    type="button"
                    @click="cancelVerification"
                    class="w-full rounded-[1.75rem] border border-slate-200 bg-white px-6 py-3.5 text-base font-semibold text-slate-700 transition hover:bg-slate-50 active:scale-[0.98]"
                >
                    Отмена
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import {
    registerRequest,
    sendEmailCodeRequest,
    verifyEmailCodeRequest
} from '../../shared/api/auth'
import Logo from '@/components/Logo.vue'
import BG from '@/assets/images/BG.svg'
import Button from '@/components/Button.vue'

const router = useRouter()
const fullName = ref('')
const email = ref('')
const phone = ref('+7 (921) 666 40 40')
const occupation = ref('Дизайнер')
const showCodeScreen = ref(false)
const verificationCode = ref('')
const codeError = ref('')

const goBack = () => {
    router.back()
}
const authorize = () => {
    registerRequest({
        name: fullName.value,
        email: email.value,
        phone: phone.value
    })
}

const getCodeByEmail = () => {
    showCodeScreen.value = true
    sendEmailCodeRequest(email.value)
}

const submitRegistration = async () => {
    try {
        // Ждём результат проверки кода
        const response = await verifyEmailCodeRequest(
            email.value,
            verificationCode.value
        )
        console.log('response', response)
        // Проверяем успешность
        if (response.data?.message === 'Код подтвержден') {
            // Регистрируем пользователя
            await registerRequest({
                name: fullName.value,
                email: email.value,
                phone: phone.value,
                occupation: occupation.value
            })

            // Перенаправляем или показываем успех
            await router.push('/profile')
        } else {
            codeError.value = 'Неверный код подтверждения'
        }
    } catch (error) {
        // Обрабатываем ошибки от API
        if (error.response?.data?.errors?.code) {
            codeError.value = error.response.data.errors.code[0]
        } else if (error.response?.data?.message) {
            codeError.value = error.response.data.message
        } else {
            codeError.value = 'Произошла ошибка. Попробуйте позже.'
        }
    }
}
</script>
