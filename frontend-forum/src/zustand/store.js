import { create } from 'zustand'
import {fetchForums} from "../services/forumService.js";

export const useUserStore = create(set => ({
    user: null,
    loading: null,
    setUser: user => set({user}),
    setLoading: isLoading => set({isLoading}),
}))

export const useForumsStore = create(set => ({
    forums: null,
    loading: false,
    setLoading: isLoading => set({isLoading}),
    fetch: async () => {
        set({loading: true})
        try{
            let {data} = await fetchForums();
            set({forums: data?.data})
        } catch (e) {
        } finally {
            set({loading: false})
        }
    }
}))