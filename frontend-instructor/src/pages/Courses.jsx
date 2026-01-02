import CourseCardComp from "../components/CourseCardComp.jsx";
import {useTranslation} from "react-i18next";
import {HashLink} from "react-router-hash-link";
import InputImageComp from "../components/input_image/InputImageComp.jsx";
import SubmitComp from "../components/SubmitComp.jsx";
import {useState} from "react";
import useInstructor from "../hooks/useInstructor.js";
import ToastComp from "../components/ToastComp.jsx";
import FilterByComp from "../components/FilterByComp.jsx";
import PaginationComp from "../components/PaginationComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import NoDataComp from "../components/NoDataComp.jsx";
import {useCoursesStore} from "../zustand/store.js";
import BackComp from "../components/BackComp.jsx";
import {Controller, useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup/src/index.js";
import {courseSchema} from "../yup/validationSchema.js";
import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";

export default function Courses() {
    const {courses, loading, fetch} = useCoursesStore()
    const {t} = useTranslation();
    const [key, setKey] = useState(0);
    const {
        success,
        errors: errorsFromBackend,
        loading: loadingRequest,
        handleClose,
        handleCourseStore,
        handleCourseDelete
    } = useInstructor();
    const [sort, setSort] = useState('desc');
    const navigate = useCustomNavigate();
    const {
        register,
        handleSubmit,
        formState: {errors: errorsYup},
        reset,
        control
    } = useForm({
        resolver: yupResolver(courseSchema(t))
    })

    function refreshData(paramPage, paramSort) {
        (async () => {
            await fetch(paramPage, paramSort)
        })()
        setSort(paramSort);
    }

    function handleNavigateToDetail(id) {
        navigate('/courses/detail#top', {id})
    }

    function handleNavigateToSections(courseId, courseTitle, courseDesc, editor) {
        navigate('/courses/sections#top', {
            courseId, courseTitle, courseDesc, editor
        })
    }

    function handleAfterClose(success) {
        if (success) {
            setKey(prevState => prevState + 1);
            reset({
                title: "",
                description: "",
                image: "",
                price: "",
                level: "",
                status: "",
                visibility: "",
                notes: "",
                editor: "",
                requirements: "",
            })
            navigate('#top');
        }
        handleClose();
    }

    return (
        <>
            {(success || errorsFromBackend?.message) &&
                <ToastComp msg={success || errorsFromBackend?.message} type={success ? 'success' : 'danger'}
                           handleOnClose={() => handleAfterClose(success)}/>}

            <HashLink to={'#insert'} smooth className={'button btn-primary'}>{t('add')}</HashLink>

            <div className={'h-full-dvh'}>
                {loading ? <div className={'loading-spinner'}></div> : courses?.data?.length > 0 ?
                    <>
                        <FilterByComp
                            filters={['asc', 'desc']}
                            name={'sort'}
                            defaultValue={sort}
                            handleOnChange={value => refreshData(1, value)}
                        />
                        <br/>
                        <div className={'card-layout'}>
                            {courses?.data?.map((value, index) => (
                                <CourseCardComp key={index} title={value.title} desc={value.description} image={value.image}>
                                    <div className={'card-wrapper-actions'}>
                                        <div className={'text-primary'}
                                             onClick={() => handleNavigateToDetail(value.id)}>
                                            {t('detail')}
                                        </div>
                                        <div className={'text-success capitalize'}
                                             onClick={() => handleNavigateToSections(value.id, value.title, value.description, value.editor)}>
                                            {t('see')} {t('sections')}
                                        </div>

                                        {loadingRequest ? <div className={'text-danger'}>Loading...</div> :
                                            <div className={'text-danger'} onClick={() => handleCourseDelete(value.id)}>
                                                {t('delete')}
                                            </div>}
                                    </div>
                                    <div>
                                        <p className="card-wrapper-date-time">{t('created_at')} : {value.created_at}</p>
                                        <p className="card-wrapper-date-time">{t('updated_at')} : {value.updated_at}</p>
                                    </div>
                                </CourseCardComp>
                            ))}
                        </div>
                        <PaginationComp data={courses?.meta?.links} onPageChange={page => refreshData(page, sort)}/>
                    </> : <NoDataComp message={t('you_havent_added_data_yet')}/>
                }
            </div>

            <br id={'insert'}/>
            <hr className={"margin-top-ideal-distance-to-header"}/>

            <form className={'card-wrapper max-width-700 mt-l'}
                  onSubmit={handleSubmit(data => handleCourseStore(data))}
                  key={key}
            >
                <h2>{t('add')} {t('course')}</h2>

                <Controller name="image" control={control}
                            render={({field, fieldState}) => (
                                <InputImageComp name="image"
                                                oldImage={field.value}
                                                handleInputOnChange={field.onChange}
                                                error={fieldState.error?.message}
                                />
                            )}/>

                <div className="max-width-500">
                    <label htmlFor="title">{t('title')}</label>
                    <input type="text" id="title" {...register("title")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={"title"}/>
                </div>
                <div className="max-width-500">
                    <label htmlFor="description">{t('description')}</label>
                    <input type="text" id="description" {...register("description")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                           field={"description"}/>
                </div>

                <div className="max-width-500">
                    <label htmlFor="price">{t('price')}</label>
                    <input type="number" id="price" {...register("price")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={"price"}/>
                </div>
                <div className="max-width-500">
                    <label htmlFor="level">{t('level')}</label>
                    <select id="level" {...register("level")}>
                        <option value="">--</option>
                        <option value="junior">junior</option>
                        <option value="middle">middle</option>
                        <option value="advanced">advanced</option>
                    </select>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={"level"}/>
                </div>
                <div className="max-width-500">
                    <label htmlFor="status">{t('status')}</label>
                    <select id="status" {...register("status")}>
                        <option value="">--</option>
                        <option value="paid">paid</option>
                        <option value="free">free</option>
                    </select>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                           field={"status"}/>
                </div>
                <div className="max-width-500">
                    <label htmlFor="visibility">{t('visibility')}</label>
                    <select id="visibility" {...register("visibility")}>
                        <option value="">--</option>
                        <option value="public">public</option>
                        <option value="private">private</option>
                    </select>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                           field={"visibility"}/>
                </div>
                <div className="max-width-500">
                    <label htmlFor="editor">{t('editor')}</label>
                    <select id="editor" {...register("editor")}>
                        <option value="">--</option>
                        <option value="javascript">javascript</option>
                        <option value="java">java</option>
                        <option value="python">python</option>
                        <option value="php">php</option>
                        <option value="c">c</option>
                        <option value="cpp">cpp</option>
                        <option value="ruby">ruby</option>
                        <option value="go">go</option>
                        <option value="swift">swift</option>
                        <option value="kotlin">kotlin</option>
                        <option value="typescript">typescript</option>
                        <option value="sql">sql</option>
                        <option value="html">html</option>
                        <option value="css">css</option>
                        <option value="xml">xml</option>
                        <option value="json">json</option>
                        <option value="yaml">yaml</option>
                        <option value="bash">bash</option>
                        <option value="shell">shell</option>
                        <option value="plaintext">plaintext</option>
                        <option value="r">r</option>
                        <option value="dart">dart</option>
                        <option value="rust">rust</option>
                        <option value="dockerfile">dockerfile</option>
                    </select>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                           field={"editor"}/>
                </div>
                <div className="max-width-500">
                    <label htmlFor="notes">{t('notes')}</label>
                    <textarea id="notes" className={'resize-none'} {...register("notes")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={"notes"}/>
                </div>
                <div className="max-width-500">
                    <label htmlFor="requirements">{t('requirements')}</label>
                    <textarea id="requirements" className={'resize-none'} {...register("requirements")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                           field={"requirements"}/>
                </div>
                <br/>
                <SubmitComp isLoading={loadingRequest}/>
            </form>
        </>
    )
}