import {useTranslation} from "react-i18next";
import CourseCardComp from "../components/CourseCardComp.jsx";
import PaginationComp from "../components/PaginationComp.jsx";
import {useState} from "react";
import FilterByComp from "../components/FilterByComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import NoDataComp from "../components/NoDataComp.jsx";
import {useCoursesStore} from "../zustand/store.js";

export default function Courses() {
    const {t} = useTranslation();
    const navigate = useCustomNavigate();
    const [sort, setSort] = useState('desc');
    const {courses, loading, fetch} = useCoursesStore()

    function handleNavigateToSections(courseId) {
        navigate('/courses/sections#top', {courseId});
    }

    function handleNavigateToQuestion(courseId, courseTitle, courseDescription) {
        navigate('/questions/form#top', {
            type: 'add',
            courseId,
            courseTitle,
            courseDescription
        });
    }

    function handleNavigateToReview(courseId, courseTitle, courseDescription) {
        navigate('/reviews/form#top', {
            type: 'add',
            courseId,
            courseTitle,
            courseDescription
        })
    }

    function refreshData(paramPage, paramSort) {
        fetch(paramPage, paramSort)
        setSort(paramSort);
    }

    return (
        <>
            <a href={import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL} target={'_blank'} className={'button btn-primary'}>
                {t('buy')} {t('courses')}
            </a>
            {loading ? <div className={'loading-spinner'}></div> :
                courses?.total > 0 ?
                    <>
                        <FilterByComp
                            filters={['asc', 'desc']}
                            name={'sort'}
                            defaultValue={sort}
                            handleOnChange={value => refreshData(1, value)}
                        />
                        <div className={'button bg-primary'}
                            onClick={() => refreshData(1, 'desc')}>Refresh Data</div>
                        <div className={'card-layout'}>
                            {courses?.data.map((value, index) => (
                                <CourseCardComp key={index} title={value.title}
                                                desc={value.description} image={value.image}>
                                    <div className={'card-wrapper-actions'}>
                                        <div className={'text-primary'}
                                             onClick={() => handleNavigateToSections(value.id)}>Detail
                                        </div>
                                        <div className={'text-warning'}
                                             onClick={() => handleNavigateToQuestion(value.id, value.title, value.description)}>Question
                                        </div>
                                        <div className={'text-success'}
                                             onClick={() => handleNavigateToReview(value.id, value.title, value.description)}>Review
                                        </div>
                                    </div>
                                </CourseCardComp>
                            ))}
                        </div>
                        <PaginationComp data={courses?.links} onPageChange={page => refreshData(page, sort)}/>
                    </>
                    :
                    <NoDataComp message={t('you_havent_added_data_yet')}/>
            }
        </>
    )
}