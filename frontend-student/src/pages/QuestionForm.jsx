import {useTranslation} from "react-i18next";
import {useLocation} from "react-router";
import SubmitComp from "../components/SubmitComp.jsx";
import {useEffect, useState} from "react";
import useStudent from "../hooks/useStudent.js";
import ToastComp from "../components/ToastComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import {useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup/src/index.js";
import {questionUpsertSchema} from "../yup/validationSchema.js";
import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";
import BackComp from "../components/BackComp.jsx";

export default function QuestionForm() {
    const {t} = useTranslation();
    const {
        loading,
        success,
        errors: errorsFromBackend,
        handleClose,
        handleQuestionStore,
        handleQuestionModify
    } = useStudent();

    const navigate = useCustomNavigate();
    const location = useLocation();
    const {state} = location;

    const [type, setType] = useState();

    const {
        register,
        handleSubmit,
        formState: {errors: errorsYup},
        reset
    } = useForm({
        resolver: yupResolver(questionUpsertSchema(t))
    })

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/questions#top');
        } else {
            setType(state?.type);

            if (state?.type === 'add') {
                reset({
                    instructor_course_id: state?.courseId,
                    question: ''
                })
            } else {
                reset({
                    id: state?.questionId,
                    question: state?.question
                })
            }
        }
    }, []);

    function handleAfterClose() {
        handleClose();
        navigate('/questions#top');
    }

    function onSubmit(data) {
        (async () => {
            if (type === 'add') {
                await handleQuestionStore(data);
            } else {
                await handleQuestionModify(data)
            }
        })()
    }

    return (
        <>
            {(success || errorsFromBackend?.message) &&
                <ToastComp msg={success || errorsFromBackend?.message} type={success ? 'success' : 'danger'}
                           handleOnClose={handleAfterClose}/>}

            {state?.courseTitle &&
                <div>
                    <h1>{state?.courseTitle}</h1>
                    <p>{state?.courseDescription}</p>
                </div>}

                <form className={'grid-start max-width-500'}
                      onSubmit={handleSubmit(onSubmit)}>
                    <div className="max-width-500">
                        <label htmlFor="question">{t(type)} {t('question')}</label>
                        <textarea id="question" className={'resize-none'} {...register("question")}/>
                        <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                               field={"question"}/>
                    </div>
                    <SubmitComp isLoading={loading}/>
                </form>

                <BackComp />
        </>
    )
}