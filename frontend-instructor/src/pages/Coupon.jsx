import {useTranslation} from "react-i18next";
import {useEffect, useState} from "react";
import {useLocation, useNavigate} from "react-router";
import {courseCouponFetch} from "../services/instructorService.js";
import BackComp from "../components/BackComp.jsx";

const Coupon = () => {
    const {t} = useTranslation();
    const navigate = useNavigate();
    const location = useLocation();
    const {state} = location;
    const [loading, setLoading] = useState(false);
    const [coupon, setCoupon] = useState(null);

    async function getData(couponId) {
        setLoading(true);

        try {
            const {data} = await courseCouponFetch(couponId);
            setCoupon(data?.data);
        } catch ({response}) {
            console.log(response);
        } finally {
            setLoading(false);
        }
    }

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/courses/coupons#top');
        } else {
            getData(state?.couponId);
        }
    }, []);

    return (
        <>
            <h2 className={'section-title-with-marker'}>{t('detail')}</h2>

            {loading ? <div className={'loading-spinner'}></div> :
            <div className={'table-box'}>
                <div className={'data-box'}>
                    <h3>{t('coupon')}</h3>
                    <div className={'data-content'}>
                        <div className={'data-key'}>Id</div>
                        <div className={'data-value'}>: {coupon?.id}</div>
                        <div className={'data-key'}>{t('discount')}</div>
                        <div className={'data-value'}>: {coupon?.discount} %</div>
                        <div className={'data-key'}>{t('expiry_date')}</div>
                        <div className={'data-value'}>: {coupon?.expiry_date}</div>
                        <div className={'data-key'}>{t('max_redemptions')}</div>
                        <div className={'data-value'}>: {coupon?.max_redemptions}</div>
                        <div className={'data-key'}>{t('created_at')}</div>
                        <div className={'data-value'}>: {coupon?.created_at}</div>
                    </div>
                </div>

                <br/>
                <br/>

                <div className={'data-box'}>
                    <h3>{t('course')}</h3>
                    <div className={'data-content'}>
                        <div className={'data-key'}>Id</div>
                        <div className={'data-value'}>: {coupon?.instructor_course?.id}</div>
                        <div className={'data-key'}>Status</div>
                        <div className={'data-value'}>: {coupon?.instructor_course?.status}</div>
                        <div className={'data-key'}>{t('title')}</div>
                        <div className={'data-value'}>: {coupon?.instructor_course?.title}</div>
                    </div>
                </div>
            </div>
            }
            <BackComp />
        </>
    )
}

export default Coupon;