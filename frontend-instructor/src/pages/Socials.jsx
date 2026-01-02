import {useTranslation} from "react-i18next";
import useInstructor from "../hooks/useInstructor.js";
import {useState} from "react";
import SubmitComp from "../components/SubmitComp.jsx";
import {HashLink} from "react-router-hash-link";
import ToastComp from "../components/ToastComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import NoDataComp from "../components/NoDataComp.jsx";
import {useSocialsStore} from "../zustand/store.js";
import {useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup/src/index.js";
import {socialSchema} from "../yup/validationSchema.js";
import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";

export default function Socials() {
    const {socials, loading} = useSocialsStore()
    const {t} = useTranslation();
    const {
        loading: loadingRequest, success, errors: errorsFromBackend, handleClose,
        handleSocialStore, handleSocialModify, handleSocialDelete
    } = useInstructor();
    const {
        register,
        handleSubmit,
        formState: {errors: errorsYup},
        reset
    } = useForm({
        resolver: yupResolver(socialSchema(t))
    })
    const [formMode, setFormMode] = useState('add');
    const navigate = useCustomNavigate();

    function clearForm() {
        setFormMode('add');
        reset(data => ({
            ...data,
            id: '',
            url_link: '',
            display_name: ''
        }));
    }

    function handleAfterClose(success) {
        if (success) {
            clearForm();
            navigate('/socials#top');
        }
        handleClose();
    }

    function handleEdit(id, urlLink, displayName) {
        setFormMode('edit');
        reset(data => ({
            ...data,
            id: id,
            url_link: urlLink,
            display_name: displayName
        }));
        navigate('#form');
    }

    function onSubmit(data) {
        (async () => {
            if (formMode === 'edit') {
                await handleSocialModify(data)
            } else {
                await handleSocialStore(data)
            }
        })()
    }

    return (
        <>
            <HashLink className={'button btn-primary'} onClick={clearForm} to={'#form'}>{t('add')}</HashLink>

            {(success || errorsFromBackend?.message) &&
                <ToastComp msg={success || errorsFromBackend?.message} type={success ? 'success' : 'danger'}
                           handleOnClose={() => handleAfterClose(success)}/>}

            <div className={'h-full-dvh'}>
                {loading ? <div className={'loading-spinner'}></div> :
                    socials?.data.length > 0 ?
                        socials?.data.map((value, index) => (
                            <div className={'card-layout'} key={index}>
                                <div className={'card-wrapper replace-shadow-with-border max-width-500'}>
                                    <div className={'data-key'}>{value.app_name}</div>
                                    <div className={'data-value'}>{value.display_name}</div>
                                    <div className={'card-wrapper-actions'}>
                                        {loadingRequest ? <p className={'text-primary'}>Loading...</p> :
                                            <>
                                                <a className={'text-primary'} target={'_blank'}
                                                   href={value.url_link}>{t('see')}</a>
                                                <div className={'text-warning'}
                                                     onClick={() => handleEdit(value.id, value.url_link, value.display_name)}>{t('edit')}</div>
                                                <div className={'text-danger'}
                                                     onClick={() => handleSocialDelete(value.id)}>{t('delete')}</div>
                                            </>}
                                    </div>
                                    <div>
                                        <p className="card-wrapper-date-time">{t('created_at')} : {value.created_at}</p>
                                        <p className="card-wrapper-date-time">{t('updated_at')} : {value.updated_at}</p>
                                    </div>
                                </div>
                            </div>
                        ))
                        : <NoDataComp message={t('you_havent_added_data_yet')}/>}
            </div>

            <br id={'form'}/>
            <hr className={"margin-top-ideal-distance-to-header"}/>

            <form className={'card-wrapper'}
                  onSubmit={handleSubmit(onSubmit)}>
                <h2>{t(formMode)} Social</h2>
                <div className="max-width-500">
                    <label htmlFor="url_link">{t('url_link')}</label>
                    <small className={'max-width-500 display-block'}>{t('inst_socials_explanation_1')}</small>
                    <input type="text" id="url_link" {...register('url_link')}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={'url_link'}/>
                </div>
                <div className="max-width-500">
                    <label htmlFor="display_name">{t('display_name')}</label>
                    <input type="text" id="display_name" {...register('display_name')}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={'display_name'}/>
                </div>
                <SubmitComp isLoading={loadingRequest}/>
            </form>
        </>
    )
}