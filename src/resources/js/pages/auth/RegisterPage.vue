<template>
    <div>
        <div class="min-h-screen bg-slate-950 text-slate-900">
            <div class="">
                <div
                    class="overflow-hidden shadow-[0_35px_60px_-15px_rgba(15,23,42,0.25)] backdrop-blur-2xl"
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
                        <div v-if="!showCodeScreen">
                            <div
                                class="space-y-4 border-b border-slate-200 pb-6"
                            >
                                <p
                                    class="text-[40px] font-normal leading-normal tracking-normal mb-1"
                                >
                                    Заполните форму и станьте участником
                                    бонусного сервиса
                                </p>
                            </div>

                            <div class="mt-6 space-y-5">
                                <div class="mt-20 relative">
                                    <label
                                        class="text-[40px] mb-2 block text-sm font-semibold text-slate-800"
                                        >Имя Фамилия</label
                                    >
                                    <IconInfo v-if="nameError" />
                                    <input
                                        v-model="fullName"
                                        type="text"
                                        placeholder="Иван Иванов"
                                        :class="[
                                            'text-[40px] w-full px-4 py-3 text-gray-500 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400',
                                            nameError
                                                ? 'border-red-500 text-red-500'
                                                : ''
                                        ]"
                                    />
                                </div>

                                <div class="mt-20 relative">
                                    <label
                                        class="text-[40px] mb-2 block text-sm font-semibold text-slate-800"
                                        >Email</label
                                    >

                                    <IconInfo v-if="emailError" />
                                    <input
                                        v-model="email"
                                        type="email"
                                        placeholder="ivanov@mail.ru"
                                        :class="[
                                            'text-[40px] w-full px-4 py-3 text-gray-500 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400',
                                            emailError
                                                ? 'border-red-500 text-red-500'
                                                : ''
                                        ]"
                                    />
                                </div>

                                <div class="mt-20 relative">
                                    <label
                                        class="text-[40px] mb-2 block text-sm font-semibold text-slate-800"
                                        >Телефон</label
                                    >
                                    <IconInfo v-if="phoneError" />
                                    <input
                                        v-model="phone"
                                        type="text"
                                        :class="[
                                            'text-[40px] w-full px-4 py-3 text-gray-500 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400',
                                            phoneError
                                                ? 'border-red-500 text-red-500'
                                                : ''
                                        ]"
                                        placeholder=""
                                    />
                                </div>

                                <div class="mt-20 relative">
                                    <label
                                        class="text-[40px] mb-2 block text-sm font-semibold text-slate-800"
                                        >Род занятий</label
                                    >
                                    <IconInfo v-if="positionError" />
                                    <select
                                        v-model="position"
                                        :class="[
                                            'text-[40px] w-full px-4 py-3 text-gray-500 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400',
                                            positionError
                                                ? 'border-red-500 text-red-500'
                                                : ''
                                        ]"
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

                        <div v-else>
                            <!-- центральный блок с сообщением "На ваш номер была отправлена СМС с кодом подтверждения" -->
                            <div class="my-2 text">
                                <p
                                    class="text-[40px] font-normal leading-normal tracking-normal mb-1"
                                >
                                    На вашу почту было отправлено сообщение с
                                    кодом подтверждения
                                </p>
                                <div
                                    class="mt-2 text-xs text-slate-400 bg-slate-50 inline-block px-3 py-1 rounded-full"
                                >
                                    {{ maskedPhone }}
                                </div>
                            </div>

                            <div class="mt-[40px]">
                                <label
                                    class="text-[30px] mb-2 block text-sm font-semibold text-slate-800 mb-[33px]"
                                    >Введите код</label
                                >
                                <CodeInput v-model="verificationCode" />
                                <p
                                    class="text-center text-xs text-slate-400 mt-2"
                                >
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

                                <Button
                                    @click="submitRegistration"
                                    text="Стать участником"
                                >
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
                </div>
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
import IconInfo from '@/components/IconInfo.vue'
import CodeInput from '@/components/CodeInput.vue'

const router = useRouter()
const fullName = ref('')
const email = ref('')
const phone = ref('')
const position = ref('')
const showCodeScreen = ref(false)
const verificationCode = ref('')
const codeError = ref('')
const emailError = ref('')
const phoneError = ref('')
const nameError = ref('')
const positionError = ref('')

const goBack = () => {
    router.back()
}
const authorize = () => {
    registerRequest({
        name: fullName.value,
        email: email.value,
        phone: phone.value,
        position: position.value
    })
}

const getCodeByEmail = async () => {
    // Проверка на клиенте до отправки

    if (validateForm()) {
        try {
            let response = await sendEmailCodeRequest(email.value)
            console.log('response', response)
            showCodeScreen.value = true
        } catch (error) {
            // Обработка ошибок, как показано выше
            if (error.response?.status === 422) {
                codeError.value =
                    error.response.data.message || 'Неверный email'
            }
        }
    }
}

function validateForm () {
    // Сброс ошибок перед проверкой
    emailError.value = ''
    phoneError.value = ''
    nameError.value = ''
    positionError.value = ''

    let isValid = true

    // Проверка email
    if (!email.value || email.value.trim() === '') {
        emailError.value = 'Введите email'
        isValid = false
    } else if (!email.value.includes('@')) {
        emailError.value = 'Некорректный email'
        isValid = false
    }

    // Проверка телефона (простой пример — хотя бы 10 цифр)
    if (
        !phone.value ||
        !/^\+?\d{10,}$/.test(phone.value.replace(/[\s()-]/g, ''))
    ) {
        phoneError.value = 'Введите корректный телефон'
        isValid = false
    }

    // Проверка имени
    if (!fullName.value || fullName.value.trim() === '') {
        nameError.value = 'Введите имя'
        isValid = false
    }

    // Проверка должности
    if (!position.value || position.value.trim() === '') {
        positionError.value = 'Введите должность'
        isValid = false
    }

    return isValid
}

const submitRegistration = async () => {
    try {
        // Ждём результат проверки кода
        const response = await verifyEmailCodeRequest(
            email.value,
            verificationCode.value
        )
        // Проверяем успешность
        if (response.data?.message === 'Код подтвержден') {
            // Регистрируем пользователя
            const registerResponse = await registerRequest({
                name: fullName.value,
                email: email.value,
                phone: phone.value,
                position: position.value,
                registration_token: response.data.registration_token
            })

            // ✅ Сохраняем токен
            const token = registerResponse.data.token
            localStorage.setItem('auth-token', token)
            // Перенаправляем или показываем успех
            await router.push('/dashboard')
            
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
    verificationCode.value = ''
}
</script>
