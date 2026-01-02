import {useTranslation} from "react-i18next";
import CodeBlockComp from "../components/CodeBlockComp.jsx";
import SubmitComp from "../components/SubmitComp.jsx";
import {useLocation} from "react-router";
import useInstructor from "../hooks/useInstructor.js";
import {useEffect, useState} from "react";
import ToastComp from "../components/ToastComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import {useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup/src/index.js";
import {lessonSchema} from "../yup/validationSchema.js";
import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";

export default function Lesson() {
    const {t} = useTranslation();
    const navigate = useCustomNavigate();
    const location = useLocation();
    const {state} = location;
    const [type, setType] = useState('add');
    const [previewCode, setPreviewCode] = useState('');
    const [editor, setEditor] = useState(state?.editor);
    const [sectionId, setSectionId] = useState(state?.sectionId);
    const {
        register,
        handleSubmit,
        formState: {errors: errorsYup},
        reset
    } = useForm({
        resolver: yupResolver(lessonSchema(t))
    })

    const {
        loading,
        success,
        errors: errorsFromBackend,
        handleClose,
        handleLessonStore,
        handleLessonModify
    } = useInstructor();

    useEffect(() => {
        if (Object.keys(state).length === 0) {
            navigate('/courses#top');
        } else {
            if (state?.type === 'edit') {
                setType('edit');
                reset(data => ({
                    ...data,
                    id: state?.lessonId,
                    instructor_section_id: state?.sectionId,
                    title: state?.title,
                    description: state?.description,
                    code: state?.code,
                    order_in_section: state?.order_in_section
                }));
            }

            reset(data => ({
                ...data,
                instructor_section_id: state?.sectionId
            }));
            setEditor(state?.editor);
            setSectionId(state?.sectionId);
        }
    }, []);

    function handleAfterClose(success) {
        if (success) {
            navigate('/courses/sections/lessons#top', {
                sectionId, editor
            });
        }
        handleClose();
    }

    function onSubmit(data) {
        (async () => {
            if (type === 'edit') {
                await handleLessonModify(data)
            } else {
                await handleLessonStore(data)
            }
        })()
    }

    return (
        <>
            {(success || errorsFromBackend?.message) &&
                <ToastComp msg={success || errorsFromBackend?.message} type={success ? 'success' : 'danger'}
                           handleOnClose={() => handleAfterClose(success)}/>}

            <h2 className={'section-title-with-marker capitalize'}>{t('lesson')}</h2>

            <form className={'grid-start'}
                  onSubmit={handleSubmit(onSubmit)}>
                <div className="max-width-500">
                    <label htmlFor="title">{t('title')}</label>
                    <input type="text" id="title" {...register("title")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={"title"}/>
                </div>
                <div className="max-width-500">
                    <label htmlFor="order_in_section">{t('order_in_section')}</label>
                    <input type="number" id="order_in_section" {...register("order_in_section")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                           field={"order_in_section"}/>
                </div>
                <div className="max-width-500">
                    <label htmlFor="description">{t(type)} {t('description')}</label>
                    <textarea id="description" className={'resize-none'} {...register("description")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                           field={"description"}/>
                </div>
                <div className="max-width-500">
                    <label htmlFor="code">{t(type)} {t('code')}</label>
                    <textarea id="code" className={'resize-none'} {...register("code")}
                        onChange={e => setPreviewCode(e.target.value)}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={"code"}/>
                </div>

                <div className={'max-width-700'}>
                    <p className={'font-medium'}>{t('example')}</p>
                    {editor && <CodeBlockComp code={previewCode} language={editor}/>}
                </div>

                <SubmitComp isLoading={loading}/>
            </form>
        </>
    )
}