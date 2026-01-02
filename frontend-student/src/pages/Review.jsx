import {useTranslation} from "react-i18next";
import {useLocation} from "react-router";
import SubmitComp from "../components/SubmitComp.jsx";
import {useEffect, useState} from "react";
import useStudent from "../hooks/useStudent.js";
import ToastComp from "../components/ToastComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import {useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup/src/index.js";
import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";
import {reviewUpsertSchema} from "../yup/validationSchema.js";

export default function Review() {
    const {t} = useTranslation();
    const {
        loading,
        success,
        errors: errorsFromBackend,
        handleClose,
        handleReviewStore,
        handleReviewModify
    } = useStudent();

    const navigate = useCustomNavigate();
    const location = useLocation();
    const {state} = location;

    const [type, setType] = useState(null);

    const {
        register,
        handleSubmit,
        formState: {errors: errorsYup},
        reset
    } = useForm({
        resolver: yupResolver(reviewUpsertSchema(t))
    })

    const [course, setCourse] = useState(null);

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/student/certificates#top');
        } else {
            if (state?.type === 'add') {
                setType('add');
                reset({
                    instructor_course_id: state?.courseId,
                    review: '',
                    rating: ''
                })
            } else {
                setType('edit');

                reset({
                    instructor_course_id: state?.courseId,
                    review: state?.review,
                    rating: state?.rating
                })
            }

            setCourse({
                title: state?.courseTitle,
                desc: state?.courseDescription
            });
        }
    }, []);

    function handleAfterClose() {
        handleClose();
        navigate('/reviews#top');
    }

    function onSubmit(data) {
        (async ()=>{
            if (type === 'add') {
                await handleReviewStore(data)
            } else {
                await handleReviewModify(data)
            }
        })()
    }

    return (
        <>
            {(success || errorsFromBackend?.message) &&
                <ToastComp msg={success || errorsFromBackend?.message} type={success ? 'success' : 'danger'}
                           handleOnClose={handleAfterClose}/>}

            {course && <div>
                <h1>{course?.title}</h1>
                <p>{course?.desc}</p>
                <br/>
                <hr className={'max-width-500'}/>
            </div>}


            <form className={'grid-start max-width-500'}
                  onSubmit={handleSubmit(onSubmit)}>
                <div className="max-width-500">
                    <label htmlFor="review">{t(type)} {t('review')}</label>
                    <textarea id="review" className={'resize-none'} {...register("review")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field="review"/>
                </div>
                <div className="max-width-500">
                    <div className="flex-ais-jcs">
                        <label htmlFor="rating">{t('rating')}</label>
                        <select id="rating" {...register("rating")}>
                            <option value="">--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field="rating"/>
                </div>
                <SubmitComp isLoading={loading}/>
            </form>
        </>
    )
}