import axios from 'axios'

const apiClient = axios.create({
    baseURL: '/api',

    withCredentials: true,
    withXSRFToken: true,

    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
    },
})

export default apiClient