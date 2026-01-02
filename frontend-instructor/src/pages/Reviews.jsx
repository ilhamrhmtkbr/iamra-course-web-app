import {useTranslation} from "react-i18next";
import {useState} from "react";
import FilterByComp from "../components/FilterByComp.jsx";
import PaginationComp from "../components/PaginationComp.jsx";
import NoDataComp from "../components/NoDataComp.jsx";
import {useCourseReviewsStore} from "../zustand/store.js";
import StarRating from "../components/StarComp.jsx";

export default function Reviews() {
    const {t} = useTranslation();
    const [sort, setSort] = useState('desc');
    const {courseReviews, loading, fetch} = useCourseReviewsStore()

    function refreshData(paramPage, paramSort) {
        (async () => {
            await fetch(paramPage, paramSort)
        })()
        setSort(paramSort);
    }

    return (
        <>
            {loading ? <div className={'loading-spinner'}></div> :
                courseReviews?.meta?.total > 0 ?
                    <>
                        <FilterByComp
                            filters={['asc', 'desc']}
                            name={'sort'}
                            defaultValue={sort}
                            handleOnChange={value => refreshData(1, value)}
                        />

                        <div className={'card-layout'}>
                            {courseReviews?.data.map((value, index) => (
                                <div className={'card-wrapper max-width-500'} key={index}>
                                    <div className={'table-box'}>
                                        <h3>{value.course_title}</h3>
                                        <br/>
                                        <div className={'data-box'}>
                                            <h4>{t('student')}</h4>
                                            <div className={'data-content'}>
                                                <div className={'data-key'}>{t('full_name')}</div>
                                                <div className={'data-value'}>{value.student_full_name}</div>
                                                <div className={'data-key'}>{t('rating')}</div>
                                                <div className={'data-value'}><StarRating rating={value.student_rating}/></div>
                                                <div className={'data-key'}>{t('review')}</div>
                                                <div className={'data-value'}>{value.student_review}</div>
                                                <div className={'data-key'}>{t('created_at')}</div>
                                                <div className={'data-value'}>{value.created_at}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </div>
                        <PaginationComp data={courseReviews?.meta?.links} onPageChange={page => refreshData(page, sort)}/>
                    </> : <NoDataComp message={t('inst_reviews_no_data')}/>}
        </>
    )
}