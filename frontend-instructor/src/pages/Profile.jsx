import {useTranslation} from "react-i18next";
import {
    useAnswersStore, useCourseLikesStore,
    useCourseReviewsStore,
    useCoursesStore,
    useEarningsStore,
    useUserStore
} from "../zustand/store.js";
import NoDataComp from "../components/NoDataComp.jsx";
import useUser from "../hooks/useUser.js";
import ToastComp from "../components/ToastComp.jsx";

export default function Profile() {
    const {t} = useTranslation();
    const {user, loading} = useUserStore()
    const {answers, loading: loadingAnswers} = useAnswersStore()
    const {earnings, loading: loadingEarnings} = useEarningsStore()
    const {courses, loading: loadingCourses} = useCoursesStore()
    const {courseLikes, loading: loadingCourseLikes} = useCourseLikesStore()
    const {courseReviews, loading: loadingReviews} = useCourseReviewsStore()
    const {loading: loadingResumeDownload, success, errors, handleClose, handleResumeDownload} = useUser()

    return (
        <>
            {(success || errors) &&
                <ToastComp type={success ? 'success' : 'danger'} msg={success ? success : errors}
                           handleOnClose={handleClose}/>}
            {loading ? <p>Loading...</p> : user ? <>
                <img src={import.meta.env.VITE_APP_IMAGE_USER_URL + user?.image} alt={user?.full_name}
                     className={'picture-default'}/>

                {user?.summary &&
                    <div>
                        <h4>{t('summary')}</h4>

                        <summary>
                            {user?.summary}
                        </summary>
                    </div>}

                <h1>{t('action')}</h1>

                <div className={'card-layout w-full'}>
                    <div className={'card-wrapper replace-shadow-with-border'}>
                        <h3 className={'capitalize'}>{t('answers')}</h3>
                        <div className={'badge badge-small bg-primary text-white'}>{loadingAnswers ? 'Loading...' : answers?.total}</div>
                    </div>
                    <div className={'card-wrapper replace-shadow-with-border'}>
                        <h3 className={'capitalize'}>{t('courses_likes')}</h3>
                        <div className={'badge badge-small bg-primary text-white'}>{loadingCourseLikes ? 'Loading...' : courseLikes?.data?.length ?? 0}</div>
                    </div>
                    <div className={'card-wrapper replace-shadow-with-border'}>
                        <h3 className={'capitalize'}>{t('courses')}</h3>
                        <div className={'badge badge-small bg-primary text-white'}>{loadingCourses ? 'Loading...' : courses?.meta?.total}</div>
                    </div>
                    <div className={'card-wrapper replace-shadow-with-border'}>
                        <h3 className={'capitalize'}>{t('reviews')}</h3>
                        <div className={'badge badge-small bg-primary text-white'}>{loadingReviews ? 'Loading...' : courseReviews?.meta?.total}</div>
                    </div>
                    <div className={'card-wrapper replace-shadow-with-border'}>
                        <h3 className={'capitalize'}>{t('earnings')}</h3>
                        <div className={'badge badge-small bg-primary text-white'}>{loadingEarnings ? 'Loading...' : earnings?.meta?.total}</div>
                    </div>
                </div>

                <div className={'table-box'}>
                    <div className={'flex-ais-jcs gap-x'}>
                        <div className={'data-box'}>
                            <h2>Biography</h2>
                            <div className={'data-content'}>
                                <div className={'data-key'}>{t('username')}</div>
                                <div className={'data-value'}>: {user?.username}</div>
                                <div className={'data-key'}>{t('full_name')}</div>
                                <div className={'data-value'}>: {user?.full_name}</div>
                                <div className={'data-key'}>{t('email')}</div>
                                <div className={'data-value'}>: {user?.email ?? '-'}</div>
                                <div className={'data-key'}>{t('role')}</div>
                                <div className={'data-value'}>: {user?.role}</div>
                                <div className={'data-key'}>{t('address')}</div>
                                <div className={'data-value'}>: {user?.address ?? '-'}</div>
                                <div className={'data-key'}>{t('dob')}</div>
                                <div className={'data-value'}>: {user?.dob ?? '-'}</div>
                                <div className={'data-key'}>Resume</div>
                                {loadingResumeDownload ? <div className={'data-value text-primary'}>Loading...</div> :
                                    <div className={'data-value text-primary cursor-pointer text-hover-underline'}
                                         onClick={() => handleResumeDownload(user?.resume)}>: {t('download')}</div>}
                            </div>
                        </div>
                    </div>
                </div>
            </> : <NoDataComp/>}
        </>
    )
}