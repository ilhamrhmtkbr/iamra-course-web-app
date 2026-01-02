import {useTranslation} from "react-i18next";
import CourseCardComp from "../components/CourseCardComp.jsx";
import {useState} from "react";
import useStudent from "../hooks/useStudent.js";
import ToastComp from "../components/ToastComp.jsx";
import FilterByComp from "../components/FilterByComp.jsx";
import PaginationComp from "../components/PaginationComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import NoDataComp from "../components/NoDataComp.jsx";
import {useCartsStore} from "../zustand/store.js";

export default function Carts() {
    const {success, errors, loading: loadingCartRemove, handleClose, handleCartRemove} = useStudent();
    const navigate = useCustomNavigate();
    const {t} = useTranslation();
    const {carts, loading, fetch} = useCartsStore()

    const [sort, setSort] = useState('desc');

    function refreshData(paramPage, paramSort) {
        fetch(paramPage, paramSort)
        setSort(paramSort);
    }

    function handleTransactionStore(
        courseId, courseTitle, courseDescription,
        coursePrice, courseLevel, courseStatus) {
        navigate('/transactions/store#top', {
            courseId, courseTitle, courseDescription,
            coursePrice, courseLevel, courseStatus
        });
    }

    function afterNotification() {
        handleClose();
        navigate('#top');
    }

    return (
        <>
            <a href={import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL} target={'_blank'}
                className={'button btn-primary'}>{t('add') + ' ' + t('course')}</a>

            {(success || errors) && <ToastComp msg={success || errors.message} type={success ? 'success' : 'danger'}
                                               handleOnClose={afterNotification}/>}

            {loading ? <div className={'loading-spinner'}></div> :
                carts?.total > 0 ?
                    <>
                        <FilterByComp filters={['asc', 'desc']} name={'sort'} defaultValue={sort}
                                      handleOnChange={value => refreshData('1', value)}
                        />
                        <div className={'card-layout'}>
                            {carts?.data?.map((value, index) => (
                                <CourseCardComp key={index} title={value.instructor_course.title}
                                                desc={value.instructor_course.description}
                                                image={value.instructor_course.image}>
                                    <div className={'card-wrapper-actions'}>
                                        <div className={'text-success'}
                                             onClick={() => handleTransactionStore(value.instructor_course_id, value.instructor_course.title, value.instructor_course.description, value.instructor_course.price, value.instructor_course.level, value.instructor_course.status)}>{t('buy')}</div>

                                        {loadingCartRemove ? <p>Loading...</p> :
                                            <div className={'text-danger'}
                                                 onClick={() => handleCartRemove(value.id)}>
                                                {t('remove')}
                                            </div>}
                                    </div>
                                </CourseCardComp>
                            ))}
                        </div>
                        <PaginationComp data={carts?.links} onPageChange={value => refreshData(value, sort)}/>
                    </>
                    :
                    <NoDataComp message={t('you_havent_added_data_yet')}/>
            }
        </>

    )
}