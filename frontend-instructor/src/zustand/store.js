import {create} from "zustand";
import {
    accountFetch,
    answersFetch,
    courseLikesFetch,
    courseReviewsFetch, coursesCouponFetch,
    coursesFetch, earningsFetch, socialsFetch
} from "../services/instructorService.js";

export const useUserStore = create(set => ({
    user: null,
    loading: null,
    setUser: user => set({user}),
    setLoading: isLoading => set({isLoading}),
}))

export const useAccountStore = create(set => ({
    account: null,
    loading: null,
    setLoading: isLoading => set({isLoading}),
    fetch: async () => {
        set({loading: true})
        try {
            let {data} = await accountFetch()
            data && set({account: data?.data})
        } catch (e) {

        } finally {
            set({loading: false})
        }
    }
}))

export const useAnswersStore = create(set => ({
    answers: null,
    loading: null,
    setLoading: isLoading => set({isLoading}),
    fetch: async (page, sort) => {
        set({loading: true})
        try {
            let {data} = await answersFetch(page, sort)
            data && set({answers: data})
        } catch (e) {
            console.log(e)
        } finally {
            set({loading: false})
        }
    }
}))

export const useCoursesStore = create(set => ({
    courses: null,
    loading: null,
    setLoading: isLoading => set({isLoading}),
    fetch: async (page, sort) => {
        set({loading: true})
        try {
            let {data} = await coursesFetch(page, sort)
            data && set({courses: data})
        } catch (e) {

        } finally {
            set({loading: false})
        }
    }
}))

export const useCourseLikesStore = create(set => ({
    courseLikes: null,
    loading: null,
    setLoading: isLoading => set({isLoading}),
    fetch: async (page, sort) => {
        set({loading: true})
        try {
            let {data} = await courseLikesFetch(page, sort)
            data && set({courseLikes: data})
        } catch (e) {

        } finally {
            set({loading: false})
        }
    }
}))

export const useCourseReviewsStore = create(set => ({
    courseReviews: null,
    loading: null,
    setLoading: isLoading => set({isLoading}),
    fetch: async (page, sort) => {
        set({loading: true})
        try {
            let {data} = await courseReviewsFetch(page, sort)
            data && set({courseReviews: data})
        } catch (e) {

        } finally {
            set({loading: false})
        }
    }
}))

export const useCourseCouponsStore = create(set => ({
    courseCoupons: null,
    loading: null,
    setLoading: isLoading => set({isLoading}),
    fetch: async (page, sort) => {
        set({loading: true})
        try {
            let {data} = await coursesCouponFetch(page, sort)
            data && set({courseCoupons: data})
        } catch (e) {

        } finally {
            set({loading: false})
        }
    }
}))

export const useEarningsStore = create(set => ({
    earnings: null,
    loading: null,
    setLoading: isLoading => set({isLoading}),
    fetch: async (page, sort) => {
        set({loading: true})
        try {
            let {data} = await earningsFetch(page, sort)
            data && set({earnings: data})
        } catch (e) {

        } finally {
            set({loading: false})
        }
    }
}))

export const useSocialsStore = create(set => ({
    socials: null,
    loading: null,
    setLoading: isLoading => set({isLoading}),
    fetch: async () => {
        set({loading: true})
        try {
            let {data} = await socialsFetch()
            data && set({socials: data})
        } catch (e) {

        } finally {
            set({loading: false})
        }
    }
}))
