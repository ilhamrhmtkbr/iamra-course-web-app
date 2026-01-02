import {useTranslation} from "react-i18next";
import {HashLink} from "react-router-hash-link";
import PaginationComp from "../components/PaginationComp.jsx";
import {useState} from "react";
import FilterByComp from "../components/FilterByComp.jsx";
import useStudent from "../hooks/useStudent.js";
import ToastComp from "../components/ToastComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import NoDataComp from "../components/NoDataComp.jsx";
import {useQuestionsStore} from "../zustand/store.js";

export default function Questions() {
    const {t} = useTranslation();
    const {handleQuestionRemove, loading: loadingQuestionRemove, success, errors, handleClose} = useStudent()
    const [sort, setSort] = useState('desc');
    const {questions, loading, fetch} = useQuestionsStore()

    const navigate = useCustomNavigate();

    function handleNavigateToDetail(id) {
        navigate('/questions/detail#top', {id});
    }

    function handleNavigateToEdit(questionId, question) {
        navigate('/questions/form#top', {
            type: 'edit',
            questionId,
            question
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
                questions?.total > 0 ?
                    <>
                        <FilterByComp
                            filters={['asc', 'desc']}
                            name={'sort'}
                            defaultValue={sort}
                            handleOnChange={value => refreshData(1, value)}
                        />

                        <div className={'card-layout'}>
                            {questions?.data.map((value, index) => (
                                <div className={'card-wrapper replace-shadow-with-border max-width-500'} key={index}>
                                    <div className={'card-wrapper-title'}>
                                        {value.instructor_course.title}
                                    </div>
                                    <div className={'table-box'}>
                                        <div className={'data-content'}>
                                            <div className={'data-key'}>{t('question')}</div>
                                            <div className={'data-value'}>: {value.question}</div>
                                        </div>
                                    </div>
                                    <div className={'card-wrapper-actions'}>
                                        <div className={'text-warning'}
                                             onClick={() => handleNavigateToEdit(value.id, value.question)}>
                                            {t('edit')}
                                        </div>
                                        <div className={'text-primary'}
                                             onClick={() => handleNavigateToDetail(value.id)}>
                                            {t('detail')}
                                        </div>
                                        {loadingQuestionRemove ? <div className={'loading-spinner'}></div> :
                                            <div className={'text-danger'}
                                                 onClick={() => handleQuestionRemove(value.id)}>
                                                {t('remove')}
                                            </div>}
                                    </div>
                                    <div className={'card-wrapper-date-time'}>{value.created_at}</div>
                                </div>
                            ))}
                        </div>
                        <PaginationComp data={questions?.links} onPageChange={page => refreshData(page, sort)}/>
                    </>
                    :
                    <>
                        <HashLink smooth to={'/courses#top'} className={'button btn-primary'}>
                            {t('add')} {t('questions')}
                        </HashLink>
                        <NoDataComp message={t('you_havent_added_data_yet')}/>
                    </>
            }
        </>
    )
}