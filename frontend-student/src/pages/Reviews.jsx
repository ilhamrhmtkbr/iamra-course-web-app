import {useTranslation} from "react-i18next";
import useStudent from "../hooks/useStudent.js";
import {useState} from "react";
import {HashLink} from "react-router-hash-link";
import FilterByComp from "../components/FilterByComp.jsx";
import ToastComp from "../components/ToastComp.jsx";
import PaginationComp from "../components/PaginationComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import NoDataComp from "../components/NoDataComp.jsx";
import {useReviewsStore} from "../zustand/store.js";
import StarRating from "../components/StarComp.jsx";

export default function Reviews() {
    const {t} = useTranslation();
    const {loading: loadingReviewRemove, success, errors, handleClose, handleReviewRemove} = useStudent();
    const [sort, setSort] = useState('desc');
    const {reviews, loading, fetch} = useReviewsStore()

    const navigate = useCustomNavigate();

    function handleNavigateToForm(courseId, courseTitle, courseDescription, review, rating) {
        navigate('/reviews/form#top', {
            type: 'edit',
            courseId,
            courseTitle,
            courseDescription,
            review,
            rating
        })
    }

    function refreshData(paramPage, paramSort) {
        fetch(paramPage, paramSort)
        setSort(paramSort);
    }

    function handleAfterClose() {
        handleClose();
        refreshData('1', 'desc');
    }

    return (
        <>
            {(success || errors) &&
                <ToastComp msg={success || errors.message} type={success ? 'success' : 'danger'}
                           handleOnClose={handleAfterClose}/>}

            {loading ? <div className={'loading-spinner'}></div> :
                reviews?.total > 0 ?
                    <>
                        <FilterByComp
                            filters={['asc', 'desc']}
                            name={'sort'}
                            defaultValue={sort}
                            handleOnChange={value => refreshData(1, value)}
                        />
                        <div className={'card-layout'}>
                            {reviews?.data.map((value, index) => (
                                <div className={'card-wrapper max-width-500'} key={index}>
                                    <div className={'card-wrapper-title'}>
                                        {value.instructor_course.title}
                                    </div>
                                    <div className={'table-box'}>
                                        <div className={'data-content'}>
                                            <div className={'data-key'}>{t('review')}</div>
                                            <div className={'data-value'}>: {value.review}</div>
                                            <div className={'data-key'}>{t('rating')}</div>
                                            <div className={'data-value'}>
                                                : <StarRating rating={value.rating}/>
                                            </div>
                                        </div>
                                    </div>
                                    <div className={'card-wrapper-actions'}>
                                        <div className={'text-warning'} onClick={() => handleNavigateToForm(
                                            value.instructor_course.id,
                                            value.instructor_course.title,
                                            value.instructor_course.description,
                                            value.review,
                                            value.rating
                                        )}>Edit
                                        </div>
                                        {loadingReviewRemove ? <p className={'text-primary'}>Loading...</p> :
                                            <div className={'text-danger'}
                                                 onClick={() => handleReviewRemove(value.id)}>Delete</div>}
                                    </div>
                                    <div className={'card-wrapper-date-time'}>
                                        {value.created_at}
                                    </div>
                                </div>
                            ))}
                        </div>
                        <PaginationComp data={reviews?.links} onPageChange={page => refreshData(page, sort)}/>
                    </>
                    :
                    <>
                        <HashLink className={'button btn-primary'} smooth to={'/courses#top'}>
                            {t('add')} {t('review')}
                        </HashLink>
                        <NoDataComp message={t('you_havent_added_data_yet')}/>
                    </>}
        </>
    )
}