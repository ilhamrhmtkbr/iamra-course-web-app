import {useTranslation} from "react-i18next";
import {useState} from "react";
import FilterByComp from "../components/FilterByComp.jsx";
import PaginationComp from "../components/PaginationComp.jsx";
import SubmitComp from "../components/SubmitComp.jsx";
import useInstructor from "../hooks/useInstructor.js";
import ToastComp from "../components/ToastComp.jsx";
import {HashLink} from "react-router-hash-link";
import {useCustomNavigate} from "../utils/Helper.js";
import NoDataComp from "../components/NoDataComp.jsx";
import {useAnswersStore} from "../zustand/store.js";
import {useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup/src/index.js";
import {answerSchema} from "../yup/validationSchema.js";
import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";

export default function Answers() {
    const customNavigate = useCustomNavigate();
    const {t} = useTranslation();
    const [sort, setSort] = useState('desc');
    const {
        loading: loadingRequest,
        success,
        errors: errorsFromBackend,
        handleClose,
        handleAnswerStore,
        handleAnswerModify
    } = useInstructor();
    const [formType, setFormType] = useState('add');
    const [question, setQuestion] = useState(null)
    const [formIsActive, setFormIsActive] = useState(false);

    const {
        register,
        handleSubmit,
        formState: {errors: errorsYup},
        reset
    } = useForm({
        resolver: yupResolver(answerSchema(t))
    })

    const {loading, answers, fetch} = useAnswersStore()

    async function refreshData(paramPage, paramSort) {
        await fetch(paramPage, paramSort)
        setSort(paramSort);
    }

    function handleAfterClose(success) {
        if (success) {
            reset({
                id: '',
                student_question_id: '',
                answer: ''
            })
            setFormType('add');
            customNavigate('/answers#top');
        }
        handleClose();
    }

    function onSubmit(data) {
        (async () => {
            if (formType === 'add') {
                await handleAnswerStore(data);
            } else {
                await handleAnswerModify(data)
            }
        })()
    }

    return (
        <>
            {(success || errorsFromBackend?.message) &&
                <ToastComp msg={success || errorsFromBackend?.message} type={success ? 'success' : 'danger'}
                           handleOnClose={() => handleAfterClose(success)}/>}

            {loading ? <div className={'loading-spinner'}></div> :
                answers?.total > 0 ?
                    <>
                        <FilterByComp
                            filters={['asc', 'desc']}
                            name={'sort'}
                            defaultValue={sort}
                            handleOnChange={value => refreshData(1, value)}
                        />

                        <div className={'card-layout'}>
                            {answers?.data?.map((value, index) => (
                                <div className={'card-wrapper max-width-500'} key={index}>
                                    <h3>{value.title}</h3>
                                    <hr/>
                                    <div className={'data-content'}>
                                        <div className={'data-key'}>{t('from')}</div>
                                        <div className={'data-value'}>: {value.student}</div>
                                        <div className={'data-key'}>{t('question')}</div>
                                        <div className={'data-value'}>: {value.question}</div>
                                        <div className={'data-key'}>{t('answer')}</div>
                                        <div
                                            className={'data-value'}>: {value.answer ?? t('inst_answers_warning')}</div>
                                        <div className={'data-key'}>{t('created_at')}</div>
                                        <div className={'data-value'}>: {value.question_created_at}</div>
                                    </div>
                                    <div className={'card-wrapper-actions'}>
                                        <HashLink smooth to={'#form'}
                                                  className={`text-${value.answer !== null ? 'warning' : 'primary'}`}
                                                  onClick={() => {
                                                      setQuestion(value.question)
                                                      setFormType(value.answer !== null ? 'edit' : 'add');
                                                      reset({
                                                          id: value.answer_id,
                                                          student_question_id: value.question_id,
                                                          answer: value.answer
                                                      })
                                                      setFormIsActive(true);
                                                  }}>{t(value.answer !== null ? 'edit' : 'add')}</HashLink>
                                    </div>
                                </div>
                            ))}
                        </div>

                        <PaginationComp data={answers?.links} onPageChange={page => refreshData(page, sort)}/>
                    </> : <NoDataComp message={t('inst_answers_no_data')}/>}

            {formIsActive &&
                <>
                    <br id={'form'}/>
                    <hr className={'padding-top-ideal-distance-to-header'}/>

                    <form className={'card-wrapper max-width-700 mt-l'}
                          onSubmit={handleSubmit(onSubmit)}>
                        {question && <p className={'capitalize'}>{question}</p>}
                        <div className="max-width-500">
                            <label htmlFor="answer">{t(formType)} {t('answer')}</label>
                            <textarea id="answer" className={'resize-none'} {...register("answer")}/>
                            <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                                   field={"answer"}/>
                        </div>
                        <br/>
                        <SubmitComp isLoading={loadingRequest}/>
                    </form>
                </>}
        </>
    )
}