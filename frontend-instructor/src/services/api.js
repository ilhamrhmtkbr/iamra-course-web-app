import axios from "axios";
import {refreshToken} from "./memberService.js";

const baseConfig = {
    headers: {
        "Content-Type": "application/json",
        "Accept": "application/json"
    },
    withCredentials: true,
    timeout: 30000
}

export const api = axios.create({
    baseURL: import.meta.env.VITE_APP_BACKEND_INSTRUCTOR_API_URL,
    ...baseConfig
});

export const memberApi = axios.create({
    baseURL: import.meta.env.VITE_APP_BACKEND_USER_API_URL,
    ...baseConfig
});

const requestInterceptor = config => {
    const lang = localStorage.getItem('lang');
    if (lang) {
        config.headers['Accept-Language'] = lang;
    }

    return config;
}

const responseInterceptor = apiInstance => ({
    onFulfilled: (response) => {
        return response;
    },
    onRejected: async (error) => {
        const originalRequest = error.config;

        if (error?.status === 401 &&
            !originalRequest.url.includes('/auth/refresh') &&
            !originalRequest._retry) {

            originalRequest._retry = true;

            try {
                await refreshToken();
                return apiInstance(originalRequest);
            } catch (refreshError) {
                window.location.href = import.meta.env.VITE_APP_FRONTEND_USER_URL + '/authentication#top';
                return Promise.reject(error);
            }
        }

        if (error?.status === 401 &&
            error?.response?.data?.message === 'Token has expired') {
            window.location.href = import.meta.env.VITE_APP_FRONTEND_USER_URL + '/authentication#top';
        }

        return Promise.reject(error);
    }
});

api.interceptors.request.use(requestInterceptor, error => {
    return Promise.reject(error);
})

memberApi.interceptors.request.use(requestInterceptor, error => {
    return Promise.reject(error);
})

const apiResponseInterceptor = responseInterceptor(api);
api.interceptors.response.use(apiResponseInterceptor.onFulfilled, apiResponseInterceptor.onRejected);

const memberApiResponseInterceptor = responseInterceptor(memberApi);
memberApi.interceptors.response.use(memberApiResponseInterceptor.onFulfilled, memberApiResponseInterceptor.onRejected);