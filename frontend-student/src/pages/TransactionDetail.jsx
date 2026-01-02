import {useTranslation} from "react-i18next";
import {useLocation} from "react-router";
import BackComp from "../components//BackComp.jsx";
import {useEffect, useState} from "react";
import {transactionFetch} from "../services/studentService.js";
import {formatNumber, useCustomNavigate} from "../utils/Helper.js";
import useStudent from "../hooks/useStudent.js";
import {useTransactionsStore} from "../zustand/store.js";

const TransactionDetail = () => {
    const {loading, handleTransactionCancel} = useStudent();

    const {t} = useTranslation();
    const location = useLocation();
    const {state} = location;
    const [transaction, setTransaction] = useState(null);
    const {fetch} = useTransactionsStore();

    const navigate = useCustomNavigate();

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/student/transactions#top');
        } else {
            (async () => {
                let {data} = await transactionFetch(state?.orderId);
                setTransaction(data?.data);
            })()
        }
    }, [state, navigate]);

    function handlePay() {
        if (!window.snap) {
            alert("Snap belum siap. Coba lagi beberapa saat.");
            return;
        }

        if (state?.data?.token) {
            window.snap.pay(state.data.token, {
                onSuccess: function (result) {
                    fetch(1, 'desc', 'all');
                    navigate('/transactions#top')
                    alert("Pembayaran berhasil!");
                },
                onClose: function () {
                    fetch(1, 'desc', 'all');
                    navigate('/transactions#top')
                    alert("Anda menutup pembayaran!");
                }
            });
        } else {
            alert("Token tidak ditemukan!");
        }
    }

    return (
        <>
            <BackComp/>

            {transaction &&
                <>
                    <img
                        className={'max-width-500 border-style-default radius-m object-fit-cover min-h-[275px] max-h-[275px]'}
                        src={import.meta.env.VITE_APP_IMAGE_COURSE_URL + transaction.instructor_course?.image}
                        alt={transaction.instructor_course?.title}
                    />

                    <div className={'table-box'}>
                        <div className={'data-box'}>
                            <h3>Detail</h3>
                            <div className={'data-content'}>
                                <div className={'data-key'}>{t('title')}</div>
                                <div className={'data-value'}> : {transaction.instructor_course?.title}</div>
                                <div className={'data-key'}>Order Id</div>
                                <div className={'data-value'}> : {transaction.order_id}</div>
                                <div className={'data-key'}>Status</div>
                                <div
                                    className={`data-value capitalize ${transaction.status === 'settlement' ? 'text-success' : 'text-warning'}`}> : {transaction.status}</div>
                                <div className={'data-key'}>{t('price')}</div>
                                <div className={'data-value'}> : {formatNumber(transaction.amount)}</div>
                                <div className={'data-key'}>{t('created_at')}</div>
                                <div className={'data-value'}> : {transaction.created_at}</div>
                            </div>
                        </div>
                    </div>
                    {transaction?.status !== 'settlement' && <div className={'flex-aic-jcs gap-m'}>
                        {loading ? <div className={'loading-spinner'}></div> :
                            <>
                                <div className={'button bg-primary'} onClick={handlePay}>Pay</div>
                                <div className={'button bg-danger'}
                                     onClick={() => handleTransactionCancel(transaction.order_id)}>Cancel
                                </div>
                            </>
                        }
                    </div>}
                    {transaction?.status !== 'settlement' &&
                        <div className={'card-wrapper replace-shadow-with-border'}>
                            <small>{t('stud_transaction_detail_warning')}</small>
                            <a href={'https://simulator.sandbox.midtrans.com/openapi/va/index'} target={'_blank'}
                               className={'text-primary text-hover-underline'}>
                                Get Free Pay Now!
                            </a>
                        </div>
                    }
                </>
            }
        </>
    )
}

export default TransactionDetail;