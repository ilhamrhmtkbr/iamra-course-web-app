import {useTranslation} from "react-i18next";
import {useLocation} from "react-router";
import {HashLink} from "react-router-hash-link";
import SubmitComp from "../components/SubmitComp.jsx";
import {useEffect, useState} from "react";
import {sectionsFetch} from "../services/instructorService.js";
import useInstructor from "../hooks/useInstructor.js";
import BackComp from "../components/BackComp.jsx";
import ToastComp from "../components/ToastComp.jsx";
import NoDataComp from "../components/NoDataComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import PaginationComp from "../components/PaginationComp.jsx";
import {useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup/src/index.js";
import {sectionSchema} from "../yup/validationSchema.js";
import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";

export default function Sections() {
    const {t} = useTranslation();
    const {
        loading: loadingRequest, success, errors: errorsFromBackend, handleClose,
        handleSectionStore, handleSectionModify, handleSectionDelete
    } = useInstructor();
    const navigate = useCustomNavigate();
    const location = useLocation();
    const {state} = location;
    const [sections, setSections] = useState(null);
    const [editor, setEditor] = useState(state?.editor);
    const [loading, setLoading] = useState(false);
    const [courseId, setCourseId] = useState(state?.courseId);
    const {
        register,
        handleSubmit,
        formState: {errors: errorsYup},
        reset
    } = useForm({
        resolver: yupResolver(sectionSchema(t))
    })

    const [formMode, setFormMode] = useState('add');

    function handleNavigateToLessons(sectionId) {
        navigate('/courses/sections/lessons#top', {
            sectionId,
            editor
        })
    }

    async function getData(courseId, page) {
        setLoading(true);

        try {
            const {data} = await sectionsFetch(page, courseId);
            setSections(data?.data);
        } catch ({response}) {

        } finally {
            setLoading(false);
        }
    }

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/courses#top');
        } else {
            (async () => {
                await getData(state?.courseId, 1)
            })()
            setCourseId(state?.courseId);
            reset({
                instructor_course_id: state?.courseId,
            })
            setEditor(state?.editor);
        }
    }, []);

    function clearForm() {
        setFormMode('add')
        reset(data => ({
            ...data,
            id: "",
            title: "",
            order_in_course: ""
        }))
    }

    function handleAfterClose(success) {
        if (success) {
            (async () => {
                await getData(courseId, 1);
            })()
            clearForm();
            navigate('#top');
        }
        handleClose();
    }

    function handleEdit(id, title, order_in_course) {
        setFormMode('edit');
        reset(data => ({
            ...data,
            id, title, order_in_course
        }));
    }

    function onSubmit(data) {
        (async () => {
            if (formMode === 'edit') {
                await handleSectionModify(data)
            } else {
                await handleSectionStore(data)
            }
        })()
    }

    return (
        <>
            {(success || errorsFromBackend?.message) &&
                <ToastComp msg={success || errorsFromBackend?.message} type={success ? 'success' : 'danger'}
                           handleOnClose={() => handleAfterClose(success)}/>}

            <div className={'grid-start'} style={{minHeight: '100dvh'}}>
                <div>
                    <h2 className={'text-break'}>{state?.courseTitle}</h2>
                    <p className={'text-break'}>{state?.courseDesc}</p>
                </div>

                <h2 className={'section-title-with-marker capitalize'}>{t('sections')}</h2>

                <HashLink to={'#insert'} smooth className={'button btn-primary'}
                          onClick={clearForm}>{t('add')}</HashLink>

                {loading ? <div className={'loading-spinner'}></div> :
                    sections?.total > 0 ?
                        <>
                            <div className={'card-layout'}>
                                {sections?.data?.map((value, index) => (
                                    <div key={index} className={'card-wrapper replace-shadow-with-border'}
                                         style={{gridTemplateRows: '1fr max-content max-content'}}>
                                        <div className={'table-box'}>
                                            <div className={'data-content'}>
                                                <div className={'data-key'}>{t('order')}</div>
                                                <div className={'data-value'}>{value.order_in_course}</div>
                                                <div className={'data-key'}>{t('title')}</div>
                                                <div className={'data-value'}>{value.title}</div>
                                            </div>
                                        </div>
                                        <div className={'card-wrapper-actions'}>
                                            {loadingRequest ? <p className={'text-primary'}>Loading...</p> :
                                                <>
                                                    <div className={'text-primary capitalize'}
                                                         onClick={() => handleNavigateToLessons(value.id)}>
                                                        {t('see')} {t('lessons')}
                                                    </div>
                                                    <HashLink smooth to={'#insert'} className={'text-warning'}
                                                              onClick={() => handleEdit(value.id, value.title, value.order_in_course)}>{t('edit')}</HashLink>
                                                    <div className={'text-danger'}
                                                         onClick={() => handleSectionDelete(value.id)}>{t('delete')}</div>
                                                </>
                                            }
                                        </div>
                                        <div>
                                            <p className="card-wrapper-date-time">{t('created_at')} : {value.created_at}</p>
                                            <p className="card-wrapper-date-time">{t('updated_at')} : {value.updated_at}</p>
                                        </div>
                                    </div>
                                ))}
                            </div>
                            <PaginationComp data={sections?.links} onPageChange={page => getData(courseId, page)}/>
                        </>
                        : <NoDataComp message={t('you_havent_added_data_yet')}/>
                }
            </div>

            <br id={'insert'}/>
            <hr className={"margin-top-ideal-distance-to-header"}/>

            <form className={'card-wrapper max-width-700'}
                  onSubmit={handleSubmit(onSubmit)}>
                <h2 className={'capitalize margin-top-l'}>{t(formMode)} {t('section')}</h2>

                <div className="max-width-500">
                    <label htmlFor="order_in_course">{t('order')}</label>
                    <input type="number" id="order_in_course" {...register("order_in_course")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                           field={"order_in_course"}/>
                </div>

                <div className="max-width-500">
                    <label htmlFor="title">{t('title')}</label>
                    <input type="text" id="title" {...register("title")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={"title"}/>
                </div>
                <br/>
                <SubmitComp isLoading={loadingRequest}/>
            </form>

            <BackComp/>
        </>
    )
}