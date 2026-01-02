import {useTranslation} from "react-i18next";
import {useState} from "react";
import SubmitComp from "../components/SubmitComp.jsx";
import {HashLink} from "react-router-hash-link";
import useInstructor from "../hooks/useInstructor.js";
import ToastComp from "../components/ToastComp.jsx";
import {formatDate, useCustomNavigate} from "../utils/Helper.js";
import {useCourseCouponsStore} from "../zustand/store.js";
import NoDataComp from "../components/NoDataComp.jsx";
import {useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup/src/index.js";
import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";
import {couponSchema} from "../yup/validationSchema.js";

const Coupons = () => {
    const {t} = useTranslation();
    const navigate = useCustomNavigate();
    const [formMode, setFormMode] = useState('add');
    const {
        register,
        handleSubmit,
        formState: {errors: errorsYup},
        reset
    } = useForm({
        resolver: yupResolver(couponSchema(t))
    })
    const {
        loading: loadingRequest, handleClose, errors: errorsFromBackend, success,
        handleCouponStore, handleCouponModify, handleCouponDelete
    } = useInstructor()
    const {courseCoupons, loading} = useCourseCouponsStore()

    function handleAfterClose(success) {
        if (success) {
            navigate('/coupons#top');
            reset(data => ({
                ...data,
                id: '',
                instructor_course_id: '',
                discount: '',
                max_redemptions: '',
                expiry_date: ''
            }))
        }

        handleClose()
    }

    function handleEdit(id, discount, maxRedemptions, expiryDate) {
        setFormMode('edit');
        reset(data => ({
            ...data,
            id: id,
            discount: discount,
            max_redemptions: maxRedemptions,
            expiry_date: expiryDate
        }));
        navigate('#form')
    }

    function handleNavigateToDetail(couponId) {
        navigate('/coupons/detail#top', {couponId});
    }

    function onSubmit(data){
        const formattedExpiryDate = formatDate(data.expiry_date);
        const payload = {
            ...data,
            expiry_date: formattedExpiryDate,
        };


        (async () => {
            if (formMode === 'edit') {
                await handleCouponModify(payload)
            } else {
                await handleCouponStore(payload)
            }
        })()
    }

    return (
        <>
            {(errorsFromBackend?.message || success) &&
                <ToastComp type={success ? 'success' : 'danger'}
                           msg={errorsFromBackend?.message || success}
                           handleOnClose={() => handleAfterClose(success)}
                />}

            <HashLink
                className={'button btn-primary'}
                smooth
                to={'#form'}
            >
                {t('add')} {t('coupons')}
            </HashLink>

            <div className={'h-full-dvh'}>
                {loading ? <div className={'loading-spinner'}></div> :
                    courseCoupons?.meta?.total > 0 ?
                        <div className={'table-box'} style={{maxWidth: '88dvw'}}>
                            <table>
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>{t('action')}</th>
                                </tr>
                                </thead>
                                <tbody>
                                {courseCoupons?.data?.map((value, index) => (
                                    <tr key={index}>
                                        <td className={'text-center'}>{value.id}</td>
                                        <td className={'action text-center'}>
                                            {loadingRequest ? <p className={'text-primary'}>Loading...</p> :
                                                <>
                                                    <div className={'text-primary'}
                                                         onClick={() => handleNavigateToDetail(value.id)}>{t('detail')}</div>
                                                    <div className={'text-warning'}
                                                         onClick={() => handleEdit(value.id, value.discount, value.max_redemptions, value.expiry_date)}>{t('edit')}</div>
                                                    <div className={'text-danger'}
                                                         onClick={() => handleCouponDelete(value.id)}>{t('delete')}</div>
                                                </>}
                                        </td>
                                    </tr>
                                ))}
                                </tbody>
                            </table>
                        </div> :
                        <NoDataComp message={t('you_havent_added_data_yet')}/>
                }
            </div>

            <br id={'form'}/>
            <hr className={"margin-top-ideal-distance-to-header"}/>

            <form className={'card-wrapper max-width-700 mt-l'}
                  onSubmit={handleSubmit(onSubmit)}>
                <h2 className={'capitalize'}>{t(formMode)} {t('coupon')}</h2>
                {formMode === 'add' ?
                    <div className="max-width-500">
                        <label htmlFor="instructor_course_id">Id {t('course')}</label>
                        <small className={'display-block'}>{t('inst_coupons_form_id')}</small>
                        <input type="text" id="instructor_course_id" {...register("instructor_course_id")}/>
                        <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={"instructor_course_id"} />
                    </div> : null}
                <div className="max-width-500">
                    <label htmlFor="discount">{t('discount')}</label>
                    <small className={'display-block'}>{t('inst_coupons_form_discount')}</small>
                    <input type="number" id="discount" {...register("discount")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={"discount"} />
                </div>
                <div className="max-width-500">
                    <label htmlFor="max_redemptions">{t('max_redemptions')}</label>
                    <small className={'display-block'}>{t('inst_coupons_form_max_redemptions')}</small>
                    <input type="number" id="max_redemptions" {...register("max_redemptions")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={"max_redemptions"} />
                </div>
                <div className="max-width-500">
                    <label htmlFor="expiry_date">{t('expiry_date')}</label>
                    <small className={'display-block'}>{t('inst_coupons_form_expiry_date')}</small>
                    <input type="date" id="expiry_date" min={new Date().toISOString().split('T')[0]}
                        {...register("expiry_date", {valueAsDate: true})}/>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={"expiry_date"} />
                </div>
                <br/>
                <SubmitComp isLoading={loadingRequest}/>
            </form>
        </>
    )
}

export default Coupons;