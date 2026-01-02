import {lazy, Suspense, useEffect} from "react";
import {Routes, Route, BrowserRouter as Router} from "react-router";
import {refreshToken} from "./services/memberService.js";
import Layout from "./pages/Layout.jsx";
import {
    useAccountStore,
    useAnswersStore, useCourseCouponsStore,
    useCourseLikesStore,
    useCourseReviewsStore,
    useCoursesStore, useEarningsStore, useSocialsStore,
    useUserStore
} from "./zustand/store.js";
import {useTranslation} from "react-i18next";
import ProgressComp from "./components/ProgressComp.jsx";
import NotFound from "./pages/NotFound.jsx";

const Profile = lazy(() => import("./pages/Profile.jsx"));
const Answers = lazy(() => import("./pages/Answers.jsx"));
const Courses = lazy(() => import("./pages/Courses.jsx"));
const Course = lazy(() => import("./pages/Course.jsx"));
const Coupons = lazy(() => import("./pages/Coupons.jsx"));
const Coupon = lazy(() => import("./pages/Coupon.jsx"));
const Sections = lazy(() => import("./pages/Sections.jsx"));
const Lessons = lazy(() => import("./pages/Lessons.jsx"));
const Lesson = lazy(() => import("./pages/Lesson.jsx"));
const Earnings = lazy(() => import("./pages/Earnings.jsx"));
const Account = lazy(() => import("./pages/Account.jsx"));
const Reviews = lazy(() => import("./pages/Reviews.jsx"));
const Socials = lazy(() => import("./pages/Socials.jsx"));

const AppRouter = () => {
    const {t} = useTranslation()
    const {user} = useUserStore()
    const {fetch: accountFetch} = useAccountStore()
    const {fetch: answersFetch} = useAnswersStore()
    const {fetch: coursesFetch} = useCoursesStore()
    const {fetch: courseLikesFetch} = useCourseLikesStore()
    const {fetch: courseReviewsFetch} = useCourseReviewsStore()
    const {fetch: courseCouponsFetch} = useCourseCouponsStore()
    const {fetch: earningsFetch} = useEarningsStore()
    const {fetch: socialsFetch} = useSocialsStore()

    useEffect(() => {
        if (user === null) {
            (async () => {
                await refreshToken();
            })();
        }
    }, [])

    useEffect(() => {
        if (user !== null) {
            if (user?.role === 'instructor'){
                (async () => {
                    await accountFetch()
                    await answersFetch(1, 'desc')
                    await coursesFetch(1, 'desc')
                    await courseLikesFetch(1, 'desc')
                    await courseReviewsFetch(1, 'desc')
                    await courseCouponsFetch(1, 'desc')
                    await earningsFetch(1, 'desc')
                    await socialsFetch()
                })();
            } else {
                let decision = confirm(t('app_router_role_permission'));
                if (decision) {
                    window.location.href = import.meta.env.VITE_APP_FRONTEND_USER_URL + '/authentication#top'
                } else {
                    window.location.href = import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL
                }
            }
        }
    }, [user]);

    return (
        <Router basename={import.meta.env.VITE_APP_FRONTEND_INSTRUCTOR_URL.includes('ngrok') ? '/instructor' : ''}>
            <Routes>
                <Route path={'/'} element={<Layout/>}>
                    <Route index={true} element={
                        <Suspense fallback={<ProgressComp />}>
                            <Profile />
                        </Suspense>
                    } />
                    <Route path={'answers'} element={
                        <Suspense fallback={<ProgressComp />}>
                            <Answers />
                        </Suspense>
                    } />
                    <Route path={'courses'}>
                        <Route index={true} element={
                            <Suspense fallback={<ProgressComp />}>
                                <Courses />
                            </Suspense>
                        } />
                        <Route path={'detail'} element={
                            <Suspense fallback={<ProgressComp />}>
                                <Course />
                            </Suspense>
                        } />
                        <Route path={'sections'}>
                            <Route index={true} element={
                                <Suspense fallback={<ProgressComp />}>
                                    <Sections />
                                </Suspense>
                            } />
                            <Route path={'lessons'}>
                                <Route index={true} element={
                                    <Suspense fallback={<ProgressComp />}>
                                        <Lessons />
                                    </Suspense>
                                } />
                                <Route path={'upsert'} element={
                                    <Suspense fallback={<ProgressComp />}>
                                        <Lesson />
                                    </Suspense>
                                } />
                            </Route>
                        </Route>
                    </Route>
                    <Route path={'coupons'}>
                        <Route index={true} element={
                            <Suspense fallback={<ProgressComp />}>
                                <Coupons />
                            </Suspense>
                        } />
                        <Route path={'detail'} element={
                            <Suspense fallback={<ProgressComp />}>
                                <Coupon />
                            </Suspense>
                        } />
                    </Route>
                    <Route path={'earnings'}>
                        <Route index={true} element={
                            <Suspense fallback={<ProgressComp />}>
                                <Earnings />
                            </Suspense>
                        } />
                        <Route path={'account'} element={
                            <Suspense fallback={<ProgressComp />}>
                                <Account />
                            </Suspense>
                        } />
                    </Route>
                    <Route path={'reviews'} element={
                        <Suspense fallback={<ProgressComp />}>
                            <Reviews />
                        </Suspense>
                    } />
                    <Route path={'socials'} element={
                        <Suspense fallback={<ProgressComp />}>
                            <Socials />
                        </Suspense>
                    } />
                </Route>
                <Route path={'*'} element={<NotFound />}/>
            </Routes>
        </Router>
    )
}

export default AppRouter;