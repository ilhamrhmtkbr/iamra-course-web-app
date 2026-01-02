import {create} from 'zustand'
import {
    cartsFetch,
    certificatesFetch,
    courseProgressesFetch,
    courseReviewsFetch,
    coursesFetch, questionsFetch, transactionsFetch
} from "../services/studentService.js";

export const useUserStore = create((set) => ({
    user: null,
    loading: true,
    setUser: (user) => set({user}),
    setLoading: (loading) => set({loading}),
}));

export const useCartsStore = create((set) => ({
    carts: null,
    loading: true,
    setLoading: (loading) => set({loading}),
    fetch: async (page, sort) => {
        set({loading: true});
        try {
            let {data} = await cartsFetch(page, sort)
            data?.data && set({carts: data?.data})
        } catch (e) {

        } finally {
            set({loading: false});
        }
    }
}));

export const useCertificatesStore = create((set) => ({
    certificates: null,
    loading: true,
    setLoading: (loading) => set({loading}),
    fetch: async (page, sort) => {
        set({loading: true});
        try {
            let {data} = await certificatesFetch(page, sort)
            data?.data && set({certificates: data?.data})
        } catch (e) {

        } finally {
            set({loading: false});
        }
    }
}));

export const useProgressesStore = create((set) => ({
    progresses: null,
    loading: true,
    setLoading: (loading) => set({loading}),
    fetch: async page => {
        set({loading: true});
        try {
            let {data} = await courseProgressesFetch(page)
            data?.data && set({progresses: data?.data})
        } catch (e) {

        } finally {
            set({loading: false});
        }
    }
}));

export const useReviewsStore = create((set) => ({
    reviews: null,
    loading: true,
    setLoading: (loading) => set({loading}),
    fetch: async (page, sort) => {
        set({loading: true});
        try {
            let {data} = await courseReviewsFetch(page, sort)
            data?.data && set({reviews: data?.data})
        } catch (e) {

        } finally {
            set({loading: false});
        }
    }
}));

export const useCoursesStore = create((set) => ({
    courses: null,
    loading: true,
    setLoading: (loading) => set({loading}),
    fetch: async (page, sort) => {
        set({loading: true});
        try {
            let {data} = await coursesFetch(page, sort)
            data?.data && set({courses: data?.data})
        } catch (e) {

        } finally {
            set({loading: false});
        }
    }
}));

export const useQuestionsStore = create((set) => ({
    questions: null,
    loading: true,
    setLoading: (loading) => set({loading}),
    fetch: async (page, sort) => {
        set({loading: true});
        try {
            let {data} = await questionsFetch(page, sort)
            data?.data && set({questions: data?.data})
        } catch (e) {

        } finally {
            set({loading: false});
        }
    }
}));

export const useTransactionsStore = create((set) => ({
    transactions: null,
    loading: true,
    setLoading: (loading) => set({loading}),
    fetch: async (page, sort, status) => {
        set({loading: true});
        try {
            let {data} = await transactionsFetch(page, sort, status)
            data?.data && set({transactions: data?.data})
        } catch (e) {

        } finally {
            set({loading: false});
        }
    }
}));