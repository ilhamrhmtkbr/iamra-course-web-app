import {useTranslation} from "react-i18next";
import {useLocation} from "react-router";
import useStudent from "../hooks/useStudent.js";
import BackComp from "../components/BackComp.jsx";
import SubmitComp from "../components/SubmitComp.jsx";
import {useEffect, useState} from "react";
import ToastComp from "../components/ToastComp.jsx";
import {formatNumber, useCustomNavigate} from "../utils/Helper.js";

export default function TransactionStore() {
    const {t} = useTranslation();
    const {loading, success, errors, handleClose, handleTransactionCheckCoupon, handleTransactionAdd} = useStudent();
    const [coupon, setCoupon] = useState(null);
    const [checkoutCoupon, setCheckoutCoupon] = useState('');

    const navigate = useCustomNavigate();
    const location = useLocation();
    const {state} = location;

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/transactions#top');
        }
    }, []);

    return (
        <>
            {(success || errors) &&
                <ToastComp msg={success || errors} type={success ? 'success' : 'danger'}
                           handleOnClose={handleClose}/>}

            {coupon && <div className={'card-wrapper replace-shadow-with-border max-width-500'}>
                <h3>{t('coupon')}</h3>
                <div className={'table-box'}>
                    <div className={'data-content'}>
                        <div className={'data-key'}>Id</div>
                        <div className={'data-value'}> : {coupon?.id}</div>
                        <div className={'data-key'}>{t('max_redemption')}</div>
                        <div className={'data-value'}> : {coupon?.max_redemptions}</div>
                        <div className={'data-key'}>{t('discount')}</div>
                        <div className={'data-value'}> : {coupon?.discount} %</div>
                        <div className={'data-key'}>{t('expiry_date')}</div>
                        <div className={'data-value'}> : {coupon?.expiry_date}</div>
                    </div>
                </div>
                <div className={'card-wrapper-actions'}>
                    <div className={'text-primary'} onClick={() => {
                        alert(t('coupon_successfully_used'));
                        setCheckoutCoupon(coupon?.id)
                    }}>{t('use')}</div>
                </div>
            </div>}

            <form className={'card-wrapper replace-shadow-with-border max-width-500'}
                  onClick={e => handleTransactionCheckCoupon(e, state?.courseId, data => setCoupon(data))}>
                <label htmlFor="course_id">Id {t('course')}</label>
                <input name="course_id" type="text" placeholder="input" id="course_id"
                       value={state?.courseId} disabled={true}/>
                <SubmitComp isLoading={loading} name={t('check')}/>
            </form>

            <div className={'table-box'}>
                <div className={'data-box'}>
                    <h3>{t('course')}</h3>
                    <div className={'data-content'}>
                        <div className={'data-key'}>{t('title')}</div>
                        <div className={'data-value'}>{state?.courseTitle}</div>
                        <div className={'data-key'}>{t('description')}</div>
                        <div className={'data-value'}>{state?.courseDescription}</div>
                        <div className={'data-key'}>{t('price')}</div>
                        <div className={'data-value'}>{formatNumber(state?.coursePrice)}</div>
                        <div className={'data-key'}>{t('level')}</div>
                        <div className={'data-value capitalize'}>{state?.courseLevel}</div>
                        <div className={'data-key'}>{t('status')}</div>
                        <div className={'data-value capitalize'}>{state?.courseStatus}</div>
                    </div>
                </div>
            </div>

            <br/>
            <hr/>
            <br/>

            {checkoutCoupon &&
                <div className={'table-box'}>
                    <div className={'data-box'}>
                        <h3>{t('coupon')}</h3>
                        <div className={'data-content'}>
                            <div className={'data-key'}>Id</div>
                            <div className={'data-value'}>{checkoutCoupon}</div>
                        </div>
                    </div>
                </div>}

            {loading ? <div className={'loading-spinner'}></div> :
                <div className={'button bg-primary'}
                     onClick={() => handleTransactionAdd(state?.courseId, checkoutCoupon)}>
                    {t('checkout')}
                </div>}
            <BackComp/>
        </>
    )
}