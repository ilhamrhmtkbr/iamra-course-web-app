import {memberApi} from "./api.js";
import {useUserStore} from "../zustand/store.js";

const {setUser, setLoading} = useUserStore.getState();

export const me = async () => {
    setLoading(true)
    try {
        const {data} = await memberApi.get('/auth/me');
        if (data?.data) {
           setUser(data?.data)
        }
    } catch (e) {

    } finally {
        setLoading(false)
    }
}

export const refreshToken = async () => {
    const response = await memberApi.get('/auth/refresh');
    if (response.status) {
        await me()
    }
}