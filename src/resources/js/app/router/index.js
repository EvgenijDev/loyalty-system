import { createRouter, createWebHistory } from 'vue-router'

import LandingPage from '@/pages/landing/LandingPage.vue'
import LoginPage from '@/pages/auth/LoginPage.vue'
import RegisterPage from '@/pages/auth/RegisterPage.vue'
import { getUserRequest } from '@/shared/api/auth.js'
// import OnboardingPage from '@/pages/onboarding/OnboardingPage.vue'
import DashboardPage from '@/pages/dashboard/DashboardPage.vue'

const routes = [
    {
        path: '/',
        name: 'landing',
        component: LandingPage
    },

    {
        path: '/login',
        name: 'login',
        component: LoginPage
    },

    {
        path: '/register',
        name: 'register',
        component: RegisterPage
    },

    {
        path: '/dashboard',
        name: 'dashboard',
        component: DashboardPage
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

// Глобальный хук для проверки авторизации
router.beforeEach(async (to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth)
    const isHomePage = to.path === '/'

    let isAuthenticated = false

    // В main.js или router.beforeEach
                
    const token = localStorage.getItem('auth-token')
    if (token) {
        try {
            const response = await getUserRequest()
            
            isAuthenticated = true
            // пользователь авторизован
        } catch {
            localStorage.removeItem('auth-token')
        }
    }

    // Если на главной и авторизован — редирект в профиль
    if (isHomePage && isAuthenticated) {
        return next('/dashboard')
    }

    // Если маршрут требует авторизации
    if (requiresAuth && !isAuthenticated) {
        return next('/')
    }

    // Во всех остальных случаях — пускаем
    next()
})

export default router
