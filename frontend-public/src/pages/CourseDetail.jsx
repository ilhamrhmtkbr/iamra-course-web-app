import {useTranslation} from "react-i18next";
import {useLocation} from "react-router";
import {Fragment, useEffect, useState} from "react";
import {formatNumber, useCustomNavigate} from "../utils/Helper.js";
import BackComp from "../components/BackComp.jsx";
import useStudent from "../hooks/useStudent.js";
import ToastComp from "../components/ToastComp.jsx";
import useMember from "../hooks/useMember.js";
import SvgComp from "../components/SvgComp.jsx";
import useAuthStore from "../zustand/store.js";
import usePublic from "../hooks/usePublic.js";
import CourseDetailSkeleton from "./CourseDetailSkeleton.jsx";

export default function CourseDetail() {
    const {success, errors, loading, handleClose, handleCartStore} = useStudent();
    const {
        success: successHooksPublic, errors: errorsHooksPublic,
        loading: loadingHooksPublic, handleClose: handleCloseHooksPublic,
        handleResumeDownload, courseDetail, fetchCourseDetail, section, setSection, fetchSection
    } = usePublic();
    const {
        success: successRequest, errors: errorsRequest,
        loading: loadingRequest, handleClose: handleCloseRequest,
        handleMemberCourseLikeModify
    } = useMember();
    const user = useAuthStore(state1 => state1.user);
    const {t} = useTranslation();
    const navigate = useCustomNavigate();
    const location = useLocation();
    const {state} = location;
    const [like, setLike] = useState(null);

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/courses#top')
        } else {
            fetchCourseDetail(state.id);
        }
    }, []);

    function handleAfterClose(success) {
        handleClose();
        if (success) {
            window.location.href = import.meta.env.VITE_APP_FRONTEND_STUDENT_URL + '/carts#top';
        } else {
            navigate('/#top')
        }
    }

    function resumeDownload() {
        if (courseDetail?.course?.instructor?.resume) {
            handleResumeDownload(courseDetail?.course?.instructor?.resume)
        } else {
            alert(t('course_instructor_no_resume'))
        }
    }

    useEffect(() => {
        setLike(courseDetail?.likes);
    }, [courseDetail]);

    function handleAddCart(courseId) {
        if (user) {
            if (user?.role === 'student') {
                handleCartStore(courseId);
            } else {
                alert(t('course_like_must_login_as_student'))
            }
        } else {
            let login = confirm(t('course_like_must_login'));
            if (login) {
                window.location.href = import.meta.env.VITE_APP_FRONTEND_USER_URL + '/authentication#top';
                localStorage.setItem('last-page', import.meta.env.VITE_APP_URL)
            }
        }
    }

    function handleLike(id) {
        if (user) {
            handleMemberCourseLikeModify(id).then(() => {
                fetchCourseDetail(state.id);
            });

            if (courseDetail?.isLikes) {
                if (like) {
                    setLike(prevState => prevState - 1);
                }
            } else {
                if (like) {
                    setLike(prevState => prevState + 1);
                }
            }
        } else {
            let login = confirm(t('course_like_must_login'));
            if (login) {
                window.location.href = import.meta.env.VITE_APP_FRONTEND_USER_URL + '/authentication#top';
                localStorage.setItem('last-page', import.meta.env.VITE_APP_URL)
            }
        }
    }

    return (
        loadingHooksPublic ?
            <CourseDetailSkeleton/> :
            <>
                {(success || errors) &&
                    <ToastComp msg={success || errors} type={success ? 'success' : 'danger'}
                               handleOnClose={() => handleAfterClose(success)}/>}

                {(successRequest || errorsRequest) &&
                    <ToastComp msg={successRequest || errorsRequest}
                               type={successRequest ? 'success' : 'danger'}
                               handleOnClose={handleCloseRequest}/>}

                {(successHooksPublic || errorsHooksPublic) &&
                    <ToastComp msg={successHooksPublic || errorsHooksPublic}
                               type={successHooksPublic ? 'success' : 'danger'}
                               handleOnClose={handleCloseHooksPublic}/>}
                {courseDetail &&
                    <div className={'max-width-1000 card-wrapper'}>
                        <BackComp/>
                        <img
                            className={'max-width-500 border-style-default radius-m object-fit-cover'}
                            style={{
                                minHeight: 275,
                                minWidth: 275,
                                maxHeight: 275
                            }}
                            src={import.meta.env.VITE_APP_IMAGE_COURSE_URL + courseDetail?.course?.image}
                            alt={courseDetail?.course?.title}
                        />

                        {loadingRequest ?
                            <div className={'loading-spinner'}></div> :
                            <div onClick={() => handleLike(courseDetail?.course?.id)}
                                 className={'flex-aic-jcc cursor-pointer w-max-content gap-s radius-s border-style-default p-s'}>
                                <SvgComp rule={`svg-l fill-blue-hover ${courseDetail?.isLikes ? 'fill-blue' : ''}`}
                                         file={'sprite'}
                                         icon={'like'}/>
                                <p className={'text-center font-bold'}>{courseDetail?.likes}</p>
                            </div>}

                        <div>
                            <h1 className={'font-medium'}>
                                {courseDetail?.course?.title}
                            </h1>
                            <p>{courseDetail?.course?.description}</p>
                        </div>

                        <div className={'flex-aic-jcs gap-l'}>
                            <div className={'max-width-300 card-wrapper replace-shadow-with-border'}>
                                <h3>{t('price')}</h3>
                                <div className="badge badge-small text-white bg-primary"
                                     >{formatNumber(courseDetail?.course?.price)}</div>
                            </div>
                            <div className={'max-width-300 card-wrapper replace-shadow-with-border'}>
                                <h3>{t('level')}</h3>
                                <div className="badge capitalize badge-small text-white bg-primary"
                                     >{courseDetail?.course?.level}</div>
                            </div>
                            <div className={'max-width-300 card-wrapper replace-shadow-with-border'}>
                                <h3>{t('status')}</h3>
                                <div
                                    className={`badge capitalize badge-small text-white bg-${courseDetail?.course?.status === 'free' ? 'success' : 'primary'}`}
                                    >{courseDetail?.course?.status}</div>
                            </div>
                        </div>

                        <div className={'data-content'}>
                            <div className={'data-key text-break'}>{t('instructor')}</div>
                            <div> : {courseDetail?.course?.instructor?.user?.full_name}</div>
                            <div className={'data-key'}>{t('resume')}</div>
                            {loadingHooksPublic ? <div className={'text-primary'}>Loading...</div> :
                                <div className={'text-primary cursor-pointer text-hover-underline'}
                                     onClick={resumeDownload}> : {t('download')}</div>}
                            <div className={'data-key'}>{t('summary')}</div>
                            <div> : {courseDetail?.course?.instructor?.summary ?? t('course_instructor_no_summary')}</div>
                        </div>
                        <br/>
                        <hr/>
                        <h4>Socials</h4>
                        {courseDetail?.course?.instructor?.socials.length > 0 ?
                            <div className={'flex-aic-jcs gap-m'}>
                                {courseDetail?.course?.instructor?.socials.map((value, index) => (
                                    <a key={index} className={'button btn-primary'} href={value.url_link}
                                       target={'_blank'}>
                                        {value.app_name + ' : ' + value.display_name}
                                    </a>
                                ))}
                            </div> : <p>{t('course_instructor_no_social')}</p>}
                        <hr/>
                        <br/>
                        <div>
                            <h3 className={'capitalize text-break'}>{t('notes')}</h3>
                            <p>{courseDetail?.course?.notes}</p>
                        </div>

                        <div>
                            <h3 className={'capitalize text-break'}>{t('requirements')}</h3>
                            <p>{courseDetail?.course?.requirements}</p>
                        </div>

                        <br/>
                        <div className={'button bg-primary'} onClick={() => fetchSection(courseDetail?.course?.id)}>
                            {t('see_sections')}
                        </div>
                        <br/>
                        {user?.role === 'student' &&
                        loading ? <div className={'loading-spinner'}></div> :
                            <div className={'text-primary cursor-pointer text-hover-underline'}
                                 onClick={() => handleAddCart(courseDetail?.course?.id)}>
                                {t('course_add_to_cart')}
                            </div>
                        }

                        <BackComp/>

                        <div className={`bottom-sheet ${section ? 'active' : ''} max-width-900`}>
                            <div className="bottom-sheet-header" onClick={() => setSection(null)}>
                                Open
                            </div>
                            <div className="bottom-sheet-content">
                                <div className="card-wrapper max-width-800 replace-shadow-with-border">
                                    <h1>Sections</h1>
                                    {section?.map((value, index) => (
                                        <div className={'card-wrapper max-width-800 replace-shadow-with-border'}
                                             key={index}>
                                            {value.title}
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>
                }
            </>
    )
}