import {lazy, Suspense, useEffect} from "react";
import {Route, BrowserRouter as Router, Routes} from "react-router";
import {refreshToken} from "./services/memberService.js";
import Layout from "./pages/Layout.jsx";
import {
    useCartsStore,
    useCertificatesStore, useCoursesStore,
    useProgressesStore, useQuestionsStore,
    useReviewsStore, useTransactionsStore,
    useUserStore
} from "./zustand/store.js";
import {useTranslation} from "react-i18next";
import ProgressComp from "./components/ProgressComp.jsx";
import NotFound from "./pages/NotFound.jsx";

const Profile = lazy(() => import("./pages/Profile.jsx"));
const Carts = lazy(() => import("./pages/Carts.jsx"));
const Certificate = lazy(() => import("./pages/Certificate.jsx"));
const Certificates = lazy(() => import("./pages/Certificates.jsx"));
const CourseProgress = lazy(() => import("./pages/CourseProgress.jsx"));
const CourseProgresses = lazy(() => import("./pages/CourseProgresses.jsx"));
const Courses = lazy(() => import("./pages/Courses.jsx"));
const Lessons = lazy(() => import("./pages/Lessons.jsx"));
const Question = lazy(() => import("./pages/Question.jsx"));
const QuestionForm = lazy(() => import("./pages/QuestionForm.jsx"));
const Questions = lazy(() => import("./pages/Questions.jsx"));
const Review = lazy(() => import("./pages/Review.jsx"));
const Reviews = lazy(() => import("./pages/Reviews.jsx"));
const Sections = lazy(() => import("./pages/Sections.jsx"));
const TransactionDetail = lazy(() => import("./pages/TransactionDetail.jsx"));
const Transactions = lazy(() => import("./pages/Transactions.jsx"));
const TransactionStore = lazy(() => import("./pages/TransactionStore.jsx"));

const AppRouter = () => {
    const {t} = useTranslation()
    const user = useUserStore(state => state.user);
    const {fetch: cartsFetch} = useCartsStore()
    const {fetch: certificatesFetch} = useCertificatesStore()
    const {fetch: courseProgressesFetch} = useProgressesStore()
    const {fetch: courseReviewsFetch} = useReviewsStore()
    const {fetch: coursesFetch} = useCoursesStore()
    const {fetch: questionsFetch} = useQuestionsStore()
    const {fetch: transactionsFetch} = useTransactionsStore()

    useEffect(() => {
        (async () => {
            await refreshToken();
        })();
    }, []);


    useEffect(() => {
        if (user != null) {
            if (user?.role === 'student') {
                (async () => {
                    await cartsFetch(1, 'desc')
                    await certificatesFetch(1, 'desc')
                    await courseProgressesFetch(1)
                    await courseReviewsFetch(1, 'desc')
                    await coursesFetch(1, 'desc')
                    await questionsFetch(1, 'desc')
                    await transactionsFetch(1, 'desc', 'all')
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
        <Router basename={import.meta.env.VITE_APP_FRONTEND_STUDENT_URL.includes('ngrok') ? '/student' : ''}>
            <Routes>
                <Route path={'/'} element={<Layout/>}>
                    <Route index={true} element={
                        <Suspense fallback={<ProgressComp/>}>
                            <Profile/>
                        </Suspense>
                    }/>
                    <Route path={'carts'} element={
                        <Suspense fallback={<ProgressComp/>}>
                            <Carts/>
                        </Suspense>
                    }/>
                    <Route path={'certificate'} element={
                        <Suspense fallback={<ProgressComp/>}>
                            <Certificate/>
                        </Suspense>
                    }/>
                    <Route path={'certificates'} element={
                        <Suspense fallback={<ProgressComp/>}>
                            <Certificates/>
                        </Suspense>
                    }/>
                    <Route path={'progress-detail'} element={
                        <Suspense fallback={<ProgressComp/>}>
                            <CourseProgress/>
                        </Suspense>
                    }/>
                    <Route path={'progresses'} element={
                        <Suspense fallback={<ProgressComp/>}>
                            <CourseProgresses/>
                        </Suspense>
                    }/>
                    <Route path={'courses'}>
                        <Route index={true} element={
                            <Suspense fallback={<ProgressComp/>}>
                                <Courses/>
                            </Suspense>
                        }/>
                        <Route path={'sections'}>
                            <Route index={true} element={
                                <Suspense fallback={<ProgressComp/>}>
                                    <Sections/>
                                </Suspense>
                            }/>
                            <Route path={'lessons'}>
                                <Route index={true} element={
                                    <Suspense fallback={<ProgressComp/>}>
                                        <Lessons/>
                                    </Suspense>
                                }/>
                            </Route>
                        </Route>
                    </Route>
                    <Route path={'questions'}>
                        <Route index={true} element={
                            <Suspense fallback={<ProgressComp/>}>
                                <Questions/>
                            </Suspense>
                        }/>
                        <Route path={'form'} element={
                            <Suspense fallback={<ProgressComp/>}>
                                <QuestionForm/>
                            </Suspense>
                        }/>
                        <Route path={'detail'} element={
                            <Suspense fallback={<ProgressComp/>}>
                                <Question/>
                            </Suspense>
                        }/>
                    </Route>
                    <Route path={'reviews'}>
                        <Route index={true} element={
                            <Suspense fallback={<ProgressComp/>}>
                                <Reviews/>
                            </Suspense>
                        }/>
                        <Route path={'form'} element={
                            <Suspense fallback={<ProgressComp/>}>
                                <Review/>
                            </Suspense>
                        }/>
                    </Route>
                    <Route path={'transactions'}>
                        <Route index={true} element={
                            <Suspense fallback={<ProgressComp/>}>
                                <Transactions/>
                            </Suspense>
                        }/>
                        <Route path={'detail'} element={
                            <Suspense fallback={<ProgressComp/>}>
                                <TransactionDetail/>
                            </Suspense>
                        }/>
                        <Route path={'store'} element={
                            <Suspense fallback={<ProgressComp/>}>
                                <TransactionStore/>
                            </Suspense>
                        }/>
                    </Route>
                </Route>
                <Route path="*" element={<NotFound/>}/>
            </Routes>
        </Router>
    )
}

export default AppRouter