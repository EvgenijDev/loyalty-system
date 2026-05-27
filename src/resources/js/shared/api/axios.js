import axios from 'axios'

const apiClient = axios.create({
    baseURL: '/api',

    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
})

// Перехватчик запросов — подставляем токен
apiClient.interceptors.request.use(config => {
    const token = localStorage.getItem('auth-token')
    if (token) {
        config.headers.Authorization = `Bearer ${token}`
    }
    return config
})

export default apiClient