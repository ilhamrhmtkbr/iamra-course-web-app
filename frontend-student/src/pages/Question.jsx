import {useTranslation} from "react-i18next";
import {useLocation} from "react-router";
import {useEffect, useState} from "react";
import {questionFetch} from "../services/studentService.js";
import {useCustomNavigate} from "../utils/Helper.js";

export default function Question() {
    const {t} = useTranslation();

    const navigate = useCustomNavigate();
    const location = useLocation();
    const {state} = location;

    const [loading, setLoading] = useState(false);
    const [question, setQuestion] = useState(null);

    async function getData(questionId) {
        setLoading(true);

        try {
            const {data} = await questionFetch(questionId);
            setQuestion(data?.data[0]);
        } catch ({response}) {

        } finally {
            setLoading(false);
        }
    }

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/student/questions#top');
        } else {
            getData(state?.id);
        }
    }, []);

    return (
        <>
            {loading ? <div className={'loading-spinner'}></div> :
                <>
                    <h2>{t('question')} : {question?.question}</h2>
                    <div className={'table-box'}>
                        <div className={'data-box'}>
                            <h3>{t('course')}</h3>
                            <div className={'data-content'}>
                                <div className={'data-key'}>Id</div>
                                <div className={'data-value'}>{question?.course_id}</div>
                                <div className={'data-key'}>{t('title')}</div>
                                <div className={'data-value'}>{question?.course_title}</div>
                                <div className={'data-key'}>{t('created_at')}</div>
                                <div className={'data-value'}>{question?.created_at}</div>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <div className={'data-box'}>
                            <h3>{t('answer')}</h3>
                            <div className={'data-content'}>
                                <div className={'data-key'}>{t('content')}</div>
                                <div className={'data-value'}>{question?.answer === null ? t('stud_question_answer_null') : question?.answer}</div>
                                <div className={'data-key'}>{t('created_at')}</div>
                                <div className={'data-value'}>{question?.created_at}</div>
                            </div>
                        </div>
                    </div>
                </>
            }
        </>
    )
}