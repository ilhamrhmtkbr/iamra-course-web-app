import {useTranslation} from "react-i18next";
import {useEffect, useState} from "react";
import useInstructor from "../hooks/useInstructor.js";
import {dataBanks, searchData} from "../utils/Helper.js";
import SubmitComp from "../components/SubmitComp.jsx";
import ModalComp from "../components/ModalComp.jsx";
import ToastComp from "../components/ToastComp.jsx";
import {useAccountStore} from "../zustand/store.js";
import {useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup/src/index.js";
import {accountSchema} from "../yup/validationSchema.js";
import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";

export default function Account() {
    const {account, loading} = useAccountStore()
    const {t} = useTranslation();
    const {
        loading: loadingRequest,
        errors: errorsFromBackend,
        success,
        handleClose,
        handleAccountModify,
        handleAccountStore,
        handleDisbursement
    } = useInstructor();
    const [showBank, setShowBank] = useState(false);
    const {
        register,
        handleSubmit,
        formState: {errors: errorsYup},
        reset,
        setValue
    } = useForm({
        resolver: yupResolver(accountSchema(t))
    })

    const [banks, setBanks] = useState(dataBanks);

    useEffect(() => {
        reset({
            account_id: account?.account_id || '',
            alias_name: account?.alias_name || '',
            bank_name: account?.bank_name || ''
        })
    }, [account]);

    function onSubmit(formData) {
        (async () => {
            if (account && 'data' in account) {
                await handleAccountModify(formData)
            } else {
                await handleAccountStore(formData)
            }
        })()
    }

    return (
        <>
            {(success || errorsFromBackend?.message) &&
                <ToastComp msg={success || errorsFromBackend?.message} type={success ? 'success' : 'danger'}
                           handleOnClose={handleClose}/>}

            {loading ? <div className={'loading-spinner'}></div> :
                <form className={'card-wrapper max-width-600'}
                      onSubmit={handleSubmit(onSubmit)}>
                    <h3>Account</h3>
                    <div className="max-width-500">
                        <label htmlFor="account_id">{t('account')}</label>
                        <small className={'max-width-500 display-block'}>{t('inst_account_explanation_1')}</small>
                        <input type="number" id="account_id" {...register('account_id')}/>
                        <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                               field={'account_id'}/>
                    </div>
                    <div className="max-width-500">
                        <label htmlFor="bank_name">{t('bank')}</label>
                        <small className={'max-width-500 display-block'}> {t('inst_account_explanation_2')}</small>
                        <input type="text" id="bank_name" {...register('bank_name')} readOnly={true}
                               onClick={() => setShowBank(true)}/>
                        <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                               field={'bank_name'}/>
                    </div>
                    {showBank &&
                        <ModalComp title={'Bank'} handleClose={() => setShowBank(false)} content={
                            <>
                                <div className={'max-width-500'}>
                                    <label htmlFor="search">{t('search')}</label>
                                    <input id="search" type="search"
                                           onChange={e => searchData(e.target.value, dataBanks, result => setBanks(result))}/>
                                </div>

                                <div className={'max-width-500'}
                                    style={{
                                        maxHeight: 200,
                                        overflowY: 'auto',
                                        overflowX: 'hidden'
                                    }}>
                                    {banks && Object.entries(banks).map(([code, name], index) => (
                                        <div key={index}
                                             className={'button btn-primary mb-m mr-m '}
                                             onClick={() => {
                                                 setValue("bank_name", code);
                                                 setShowBank(false);
                                             }}>
                                            <div>
                                                <h3 className={'capitalize'}>{code}</h3>
                                                <p className={'max-width-500 overflow-auto'}>{name}</p>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            </>
                        }/>}
                    <div className="max-width-500">
                        <label htmlFor="alias_name">{t('alias_name')}</label>
                        <small className={'max-width-500 display-block'}>{t('inst_account_explanation_3')}</small>
                        <input type="text" id="alias_name" {...register('alias_name')}/>
                        <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                               field={'alias_name'}/>
                    </div>
                    <SubmitComp isLoading={loadingRequest}/>
                </form>}

            {
                loadingRequest ? <div className={'button btn-primary'}>Loading...</div> :
                    <div className={'button btn-primary'} onClick={handleDisbursement}>{t('inst_account_button')}</div>
            }
        </>
    )
}
