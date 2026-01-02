import useAuthStore from "../zustand/store.js";
import {authApi, memberApi} from "./api.js";

export const register = async data =>{
    const response = await authApi.post('/auth/register', data);
    return response.data;
}

export const login = async data =>{
    const response = await authApi.post('/auth/login', data);
    return response.data;
}

export const loginWithGoogle = async data => {
    const response = await authApi.post('/auth/login-with-google', data);
    return response.data;
}

export const me = async () => {
    const {data} = await memberApi.get('/auth/me');
    if (data?.data) {
        useAuthStore.getState().setUser(data?.data)
    }
    return data;
}

export const refreshToken = async () => {
    const response = await memberApi.get('/auth/refresh');
    if (response.status) {
        await me()
    }
    return response;
}

export const logout = async () => {
    useAuthStore.getState().logout();
    const response = await memberApi.get("/auth/logout");
    if (response.status) {
        return window.location.href = import.meta.env.VITE_APP_FRONTEND_USER_URL + '/authentication#top'
    }
}