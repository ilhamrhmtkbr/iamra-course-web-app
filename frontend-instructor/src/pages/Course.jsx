import {useTranslation} from "react-i18next";
import InputImageComp from "../components/input_image/InputImageComp.jsx";
import SubmitComp from "../components/SubmitComp.jsx";
import {HashLink} from "react-router-hash-link";
import {useEffect, useState} from "react";
import {useLocation} from "react-router";
import {courseFetch} from "../services/instructorService.js";
import useInstructor from "../hooks/useInstructor.js";
import ToastComp from "../components/ToastComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import BackComp from "../components/BackComp.jsx";
import {Controller, useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup/src/index.js";
import {courseSchema} from "../yup/validationSchema.js";
import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";

export default function Course() {
    const {t} = useTranslation();
    const [loading, setLoading] = useState(false);
    const navigate = useCustomNavigate();
    const location = useLocation();
    const {state} = location;
    const [courseId, setCourseId] = useState('');
    const {
        register,
        handleSubmit,
        formState: {errors: errorsYup},
        reset,
        control,
        getValues
    } = useForm({
        resolver: yupResolver(courseSchema(t))
    });

    const {
        loading: loadingCourseModify,
        success,
        errors: errorsFromBackend,
        handleClose,
        handleCourseModify
    } = useInstructor();

    async function getData(id) {
        setLoading(true);

        try {
            const {data} = await courseFetch(id);
            reset({
                id: data?.data?.id,
                title: data?.data?.title,
                description: data?.data?.description,
                image: data?.data?.image,
                price: data?.data?.price,
                level: data?.data?.level,
                status: data?.data?.status,
                visibility: data?.data?.visibility,
                notes: data?.data?.notes,
                editor: data?.data?.editor,
                requirements: data?.data?.requirements
            })
        } catch ({response}) {

        } finally {
            setLoading(false);
        }
    }

    function handleNavigateToCoupons() {
        navigate('/coupons#form', {courseId});
    }

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/courses#top');
        } else {
            (async () => {
                await getData(state?.id);
            })()
            setCourseId(state?.id);
        }
    }, []);

    function handleAfterClose(success) {
        if (success) {
            navigate('/courses#top');
        }
        handleClose();
    }

    return (
        <>
            {(success || errorsFromBackend?.message) &&
                <ToastComp msg={success || errorsFromBackend?.message} type={success ? 'success' : 'danger'}
                           handleOnClose={() => handleAfterClose(success)}/>}

            <div className={'flex-aic-jcs gap-m'}>
                <HashLink to={'#edit'} smooth className={'text-primary'}>{t('edit')}</HashLink>
                <div>|</div>
                <div className={'text-success cursor-pointer'}
                     onClick={handleNavigateToCoupons}>{t('add')} {t('coupon')}</div>
            </div>

            {loading ? <div className={'loading-spinner'}></div> :
                <>
                    <img className={'max-width-500 radius-m border-style-default object-fit-cover'}
                         style={{maxHeight: 275}}
                         src={import.meta.env.VITE_APP_IMAGE_COURSE_URL + getValues('image')}
                         alt={'ilhamrhmtkbr'}/>
                    <div>
                        <h2>{getValues("title")}</h2>
                        <p>{getValues("description")}</p>
                    </div>
                    <div className={'flex-ais-jcs gap-m'}>
                        <div className={'table-box'}>
                            <div className={'data-box'}>
                                <h3>{t('course')}</h3>
                                <div className={'data-content'}>
                                    <div className={'data-key'}>{t('Id')}</div>
                                    <div className="data-value text-primary cursor-pointer text-hover-underline"
                                         onClick={() => {
                                             const textarea = document.createElement('textarea');
                                             textarea.value = courseId;
                                             textarea.setAttribute('readonly', '');
                                             textarea.style.position = 'absolute';
                                             textarea.style.left = '-9999px';
                                             document.body.appendChild(textarea);
                                             textarea.select();
                                             const successful = document.execCommand('copy');
                                             document.body.removeChild(textarea);

                                             if (successful) {
                                                 alert(t('success_copy'));
                                             }
                                         }}
                                    >
                                        Copy
                                    </div>

                                    <div className={'data-key'}>{t('price')}</div>
                                    <div className={'data-value'}>{getValues("price")}</div>
                                    <div className={'data-key'}>{t('level')}</div>
                                    <div className={'data-value capitalize'}>{getValues("level")}</div>
                                    <div className={'data-key'}>{t('status')}</div>
                                    <div className={'data-value capitalize'}>{getValues("status")}</div>
                                    <div className={'data-key'}>{t('visibility')}</div>
                                    <div className={'data-value capitalize'}>{getValues("visibility")}</div>
                                    <div className={'data-key'}>{t('editor')}</div>
                                    <div className={'data-value capitalize'}>{getValues("editor")}</div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div>
                        <h4>{t('notes')}</h4>
                        <p>{getValues("notes")}</p>
                    </div>
                    <div>
                        <h4>{t('requirements')}</h4>
                        <p>{getValues("requirements")}</p>
                    </div>
                </>
            }
            <BackComp/>

            <br id={'edit'}/>
            <hr className={"margin-top-ideal-distance-to-header"}/>

            <form className={'card-wrapper max-width-700 margin-top-l'}
                  onSubmit={handleSubmit(data => handleCourseModify(data))}
            >
                <h2>{t('edit')} {t('course')}</h2>

                <Controller name="image" control={control}
                            render={({field, fieldState}) => (
                                <InputImageComp name="image"
                                                oldImage={import.meta.env.VITE_APP_IMAGE_COURSE_URL + getValues('image')}
                                                handleInputOnChange={field.onChange}
                                                error={fieldState.error?.message ?? errorsFromBackend?.errors?.image?.[0]}
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
                <SubmitComp isLoading={loadingCourseModify}/>
            </form>
        </>
    )
}