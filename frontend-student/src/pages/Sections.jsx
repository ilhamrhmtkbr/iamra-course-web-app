import {useLocation} from "react-router";
import {useEffect, useState} from "react";
import {useTranslation} from "react-i18next";
import {sectionsFetch} from "../services/studentService.js";
import {formatNumber, useCustomNavigate} from "../utils/Helper.js";
import NoDataComp from "../components/NoDataComp.jsx";
import {useProgressesStore} from "../zustand/store.js";

export default function Sections() {
    const {t} = useTranslation();
    const navigate = useCustomNavigate();
    const location = useLocation();
    const {state} = location;
    const [course, setCourse] = useState(null);
    const [loading, setLoading] = useState(false);
    const [progresses, setProgresses] = useState(null);
    const {progresses: progressData} = useProgressesStore()

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/courses#top')
        } else {
            setLoading(true);
            (async () => {
                try {
                    const {data} = await sectionsFetch(state?.courseId);
                    setCourse(data?.data[0]);
                } catch (e) {
                    console.log(e)
                } finally {
                    setLoading(false);
                }
            })()
        }
    }, []);

    useEffect(() => {
        if (progressData && course){
            progressData?.data?.map((value) => {
                if (value.instructor_course_id === course?.id) {
                    setProgresses(value?.sections)
                }
            })
        }
    }, [progressData, course])

    function handleNavigateToLessons(courseId, sectionId, editor, sectionTitle, isCompleted) {
        navigate('/courses/sections/lessons#top', {
            courseId,
            sectionId,
            editor,
            sectionTitle,
            isCompleted
        })
    }

    return (
        loading ? <div className={'loading-spinner'}></div> : course ?
            <>
                <div>
                    <h3>{course?.title}</h3>
                    <p>{course?.description}</p>
                </div>
                <div className={'table-box'}>
                    <div className={'data-box'}>
                        <div className={'data-content'}>
                            <div className={'data-key'}>Price</div>
                            <div className={'data-value'}>{formatNumber(course?.price)}</div>
                            <div className={'data-key'}>Level</div>
                            <div className={'data-value'}>{course?.level}</div>
                            <div className={'data-key'}>Status</div>
                            <div className={'data-value'}>{course?.status}</div>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Notes</h4>
                    <small>{course?.notes}</small>
                </div>

                <div>
                    <h4>Requirements</h4>
                    <small>{course?.requirements}</small>
                </div>

                <div className={'table-box'}>
                    <table>
                        <thead>
                        <tr>
                            <th>{t('title')}</th>
                            <th>{t('status')}</th>
                            <th>{t('action')}</th>
                        </tr>
                        </thead>
                        <tbody>
                        {course?.sections?.map((value, index) => {
                            const isCompleted = Object.values(progresses ?? {}).includes(value.title);

                            return (
                                <tr key={index}>
                                    <td>{value.title}</td>
                                    <td className={`text-center ${isCompleted ? 'text-success' : 'text-danger'}`}>
                                        {isCompleted ? 'Completed' : 'Uncompleted'}
                                    </td>
                                    <td className={'action'}>
                                        <div
                                            className={'text-primary'}
                                            onClick={() =>
                                                handleNavigateToLessons(
                                                    value.instructor_course_id,
                                                    value.id,
                                                    course.editor,
                                                    value.title,
                                                    isCompleted
                                                )
                                            }
                                        >
                                            See
                                        </div>
                                    </td>
                                </tr>
                            );
                        })}
                        </tbody>
                    </table>
                </div>
            </> : <NoDataComp message={t('stud_sections_warning')}/>
    )
}