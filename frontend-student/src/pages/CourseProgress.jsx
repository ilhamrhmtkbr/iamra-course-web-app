import {useTranslation} from "react-i18next";
import CourseCardComp from "../components/CourseCardComp.jsx";
import {useEffect, useState} from "react";
import {courseProgressFetch} from "../services/studentService.js";
import ChartComp from "../components/ChartComp.jsx";
import BackComp from "../components/BackComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import {useLocation} from "react-router";

export default function CourseProgress() {
    const {t} = useTranslation();

    const navigate = useCustomNavigate();
    const location = useLocation();
    const {state} = location

    const [loading, setLoading] = useState(false);
    const [course, setCourse] = useState(null);

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/student/course-progresses#top')
        }else{
            (async () => {
                setLoading(true);

                try {
                    const {data} = await courseProgressFetch(state?.courseId);
                    setCourse(data?.data?.instructor_course);
                } catch ({response}) {

                } finally {
                    setLoading(false);
                }
            })()
        }
    }, []);

    return (
        <>
            <div style={{width:200, height:200}}>
                {state?.completedSections === state?.totalSections ?
                    <ChartComp data={[
                        { name: 'Completed', value: state?.completedSections },
                    ]}/> :
                    <ChartComp data={[
                        { name: 'Completed', value: state?.completedSections },
                        { name: 'Total', value: state?.totalSections}
                    ]}/>
                }
            </div>
            {loading ? <div className={'loading-spinner'}></div>:
                <div className={'flex-ais-jcs gap-m'}>
                    <CourseCardComp title={course?.title} desc={course?.description} image={course?.image}/>
                    <div className={'table-box'}>
                        <div className={'data-box'}>
                            <h3>{t('course')}</h3>
                            <div className={'data-content'}>
                                <div className={'data-key'}>Id</div>
                                <div className={'data-value'}>{course?.id}</div>
                                <div className={'data-key'}>{t('price')}</div>
                                <div className={'data-value'}>{course?.price}</div>
                                <div className={'data-key'}>{t('status')}</div>
                                <div className={'data-value'}>{course?.status}</div>
                                <div className={'data-key'}>{t('level')}</div>
                                <div className={'data-value'}>{course?.level}</div>
                                <div className={'data-key'}>{t('completed_sections')}</div>
                                <div className={'data-value'}>{state?.completedSections}</div>
                                <div className={'data-key'}>{t('total_sections')}</div>
                                <div className={'data-value'}>{state?.totalSections}</div>
                            </div>
                        </div>

                        <br/>
                        <br/>

                        <br/>
                        <br/>

                        <BackComp/>
                    </div>
                </div>
            }
        </>
    )
}