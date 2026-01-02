import CodeBlockComp from "../components/CodeBlockComp.jsx";
import {useLocation} from "react-router";
import {useEffect, useState} from "react";
import {lessonsFetch} from "../services/studentService.js";
import PaginationComp from "../components/PaginationComp.jsx";
import {useTranslation} from "react-i18next";
import useStudent from "../hooks/useStudent.js";
import ToastComp from "../components/ToastComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";

export default function Lessons() {
    const navigate = useCustomNavigate();
    const location = useLocation();
    const {state} = location
    const {t} = useTranslation();
    const [lang, setLang] = useState(state?.editor);
    const [completed, setCompleted] = useState(state?.isCompleted);
    const [courseId, setCourseId] = useState(state?.courseId);
    const [sectionId, setSectionId] = useState(state?.sectionId);
    const [sectionTitle, setSectionTitle] = useState(state?.sectionTitle);
    const {loading: loadingCourseProgress, handleCourseProgressStore, success, errors, handleClose} = useStudent();

    const [lessons, setLessons] = useState(null);
    const [loading, setLoading] = useState(false);

    async function getData(page) {
        if (sectionId) {
            setLoading(true);

            try {
                const {data} = await lessonsFetch(sectionId, page);
                setLessons(data?.data);
            } catch ({response}) {
            } finally {
                setLoading(false);
            }
        }
    }

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/courses#top')
        } else {
            setCourseId(state?.courseId);
            setSectionId(state?.sectionId);
            setSectionTitle(state?.sectionTitle);
            setLang(state?.editor);
            setCompleted(state?.isCompleted);
            getData('1');
        }
    }, []);

    function handleAfterClose(success){
        handleClose();
        success && navigate('/courses/sections#top', {courseId})
    }

    return (
        <>
            {(success || errors) &&
                <ToastComp msg={success || errors} type={success ? 'success' : 'danger'}
                           handleOnClose={handleAfterClose}/>}

            {loading ? <div className={'loading-spinner'}></div> :
                lessons?.total > 0 ?
                    <>
                        <div className={'grid'} style={{gap: 42}}>
                            {lessons?.data.map((value, index) => (
                                <article key={index}>
                                    <h3>{value.title}</h3>
                                    <p>{value.description}</p>
                                    {lang && <CodeBlockComp code={atob(value.code)} language={lang}/>}
                                </article>
                            ))}
                        </div>
                        <PaginationComp data={lessons?.links} onPageChange={page => getData(page)}/>

                        <br/>
                        <hr/>
                        <br/>

                        <p className={'text-center'}>{t('stud_lessons_finish_section')}</p>

                        {lessons?.current_page === lessons?.last_page &&
                            (loadingCourseProgress ? <div className={'loading-spinner ps-center'}></div> :
                                <div className={'button bg-primary ps-center'} onClick={() => {
                                    completed ? alert('Completed') : handleCourseProgressStore(courseId, sectionId, sectionTitle);
                                }}>Finish</div>)}
                    </> :
                    <p className={'text-error-msg'}>{t('stud_lessons_warning')}</p>
            }
        </>
    )
}