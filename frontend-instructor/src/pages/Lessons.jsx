import CodeBlockComp from "../components/CodeBlockComp.jsx";
import {useTranslation} from "react-i18next";
import {useLocation} from "react-router";
import {useEffect, useState} from "react";
import {lessonsFetch} from "../services/instructorService.js";
import useInstructor from "../hooks/useInstructor.js";
import ToastComp from "../components/ToastComp.jsx";
import NoDataComp from "../components/NoDataComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";

export default function Lessons() {
    const {t} = useTranslation();
    const location = useLocation();
    const {state} = location;
    const [sectionId, setSectionId] = useState('');
    const navigate = useCustomNavigate();
    const [editor, setEditor] = useState(state?.editor);
    const [lessons, setLessons] = useState(null);
    const [loading, setLoading] = useState(false);
    const {loading: loadingDelete, success, errors, handleClose, handleLessonDelete} = useInstructor();

    async function getData(page, sectionId) {
        setLoading(true);

        try {
            const {data} = await lessonsFetch(page, sectionId);
            setLessons(data?.data)
        } catch ({response}) {

        } finally {
            setLoading(false);
        }
    }

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/courses#top');
        } else {
            setSectionId(state?.sectionId);
            setEditor(state?.editor);

            (async () => {
                await getData('1', state?.sectionId);
            })()
        }
    }, []);

    function handleNavigateToUpdate(lessonId, title, description, code, order_in_section) {
        navigate('/courses/sections/lessons/upsert#top', {
            type: 'edit',
            sectionId, lessonId, editor,
            title, description, code, order_in_section
        })
    }

    function handleAfterClose(success) {
        if (success) {
            (async () => {
                await getData('1', sectionId);
            })()
        }
        handleClose();
    }

    return (
        <>
            {(success || errors?.message) &&
                <ToastComp msg={success || errors?.message} type={success ? 'success' : 'danger'}
                           handleOnClose={() => handleAfterClose(success)}/>}

            <h2 className={'section-title-with-marker'}>Lesson</h2>

            <p className={'button btn-primary'}
               onClick={() => navigate('upsert#top', {
                   type: 'add', sectionId, editor
               })}
            >{t('add')}</p>

            {loading ? <div className={'loading-spinner'}></div> :
                lessons?.total > 0 ? lessons?.data.map((value, index) => (
                    <article className={'card-wrapper'}
                             style={{
                                 gridTemplateRows: '1fr max-content max-content'
                             }}
                             key={index}>
                        <p className={'card-wrapper-title text-break'}>{value.title}</p>
                        <p className={'text-break'}>{value.description}</p>
                        <CodeBlockComp code={atob(value.code)} language={value.editor}/>
                        <div className={'card-wrapper-actions'}>
                            {loadingDelete ? <p className={'text-primary'}>Loading...</p> :
                                <>
                                    <div className={'text-success'}
                                         onClick={() => handleNavigateToUpdate(value.id, value.title, value.description, atob(value.code), value.order_in_section)}>{t('update')}</div>
                                    {loadingDelete ? <p className={'text-danger'}>Loading...</p> :
                                        <div className={'text-danger'}
                                             onClick={() => handleLessonDelete(sectionId, value.id)}>{t('delete')}</div>}
                                </>
                            }
                        </div>
                        <div>
                            <p className="card-wrapper-date-time">{t('created_at')} : {value.created_at}</p>
                            <p className="card-wrapper-date-time">{t('updated_at')} : {value.updated_at}</p>
                        </div>
                    </article>
                )) : <NoDataComp message={t('you_havent_added_data_yet')}/>
            }
        </>
    )
}