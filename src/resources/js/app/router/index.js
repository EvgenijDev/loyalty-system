import { createRouter, createWebHistory } from 'vue-router'

import LandingPage from '@/pages/landing/LandingPage.vue'
import LoginPage from '@/pages/auth/LoginPage.vue'
import RegisterPage from '@/pages/auth/RegisterPage.vue'
// import OnboardingPage from '@/pages/onboarding/OnboardingPage.vue'
// import DashboardPage from '@/pages/dashboard/DashboardPage.vue'

const routes = [
    {
        path: '/',
        name: 'landing',
        component: LandingPage,
    },

    {
        path: '/login',
        name: 'login',
        component: LoginPage,
    },

    {
        path: '/register',
        name: 'register',
        component: RegisterPage,
    },

   //  {
   //      path: '/onboarding',
   //      name: 'onboarding',
   //      component: OnboardingPage,
   //  },

   //  {
   //      path: '/dashboard',
   //      name: 'dashboard',
   //      component: DashboardPage,
   //      meta: {
   //          requiresAuth: true,
   //      },
   //  },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router