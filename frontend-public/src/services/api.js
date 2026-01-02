import axios from "axios";

const baseConfig = {
    headers: {
        "Content-Type": "application/json",
        "Accept": "application/json"
    },
    withCredentials: true,
    timeout: 30000
};

const api = axios.create({
    baseURL: import.meta.env.VITE_APP_BACKEND_PUBLIC_API_URL,
    ...baseConfig
});

export const studentApi = axios.create({
    baseURL: import.meta.env.VITE_APP_BACKEND_STUDENT_API_URL,
    ...baseConfig
});

export const memberApi = axios.create({
    baseURL: import.meta.env.VITE_APP_BACKEND_USER_API_URL,
    ...baseConfig
});

const requestInterceptor = (config) => {
    const lang = localStorage.getItem('lang');
    if (lang) {
        config.headers['Accept-Language'] = lang;
    }
    return config;
};

const responseInterceptor = (apiInstance) => ({
    onFulfilled: (response) => {
        return response;
    },
    onRejected: async (error) => {
        const originalRequest = error.config;

        if (error.response?.status === 401 &&
            !originalRequest.url.includes('/auth/refresh') &&
            !originalRequest._retry) {

            originalRequest._retry = true;

            try {
                await api.post('/auth/refresh');
                return apiInstance(originalRequest);
            } catch (refreshError) {
                return Promise.reject(error);
            }
        }

        return Promise.reject(error);
    }
});

api.interceptors.request.use(requestInterceptor, error => {
    return Promise.reject(error);
});

studentApi.interceptors.request.use(requestInterceptor, error => {
    return Promise.reject(error);
});

memberApi.interceptors.request.use(requestInterceptor, error => {
    return Promise.reject(error);
});

const studentApiResponseInterceptor = responseInterceptor(studentApi);
studentApi.interceptors.response.use(studentApiResponseInterceptor.onFulfilled, studentApiResponseInterceptor.onRejected);

const memberApiResponseInterceptor = responseInterceptor(memberApi);
memberApi.interceptors.response.use(memberApiResponseInterceptor.onFulfilled, memberApiResponseInterceptor.onRejected);

export default api;

