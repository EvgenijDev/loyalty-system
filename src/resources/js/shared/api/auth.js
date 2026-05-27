import apiClient from './axios'


export const registerRequest = async (data) => {
    return apiClient.post('/register-with-email', data)
}

export const sendEmailCodeRequest = async (email) => {
    return apiClient.post('/send-email-code', { email })
}

export const verifyEmailCodeRequest = async (email, code) => {
    return apiClient.post('/verify-email-code', { email, code })
}

export const loginRequest = async (data) => {
    return apiClient.post('/login', data)
}

export const getUserRequest = async () => {
    return apiClient.get('/user')
}

export const logoutRequest = async () => {
    return apiClient.post('/logout')
}