import {useTranslation} from "react-i18next";
import {useState} from "react";
import {HashLink} from "react-router-hash-link";
import {formatNumber, useCustomNavigate} from "../utils/Helper.js";
import FilterByComp from "../components/FilterByComp.jsx";
import PaginationComp from "../components/PaginationComp.jsx";
import {useCoursesStore, useTransactionsStore} from "../zustand/store.js";

export default function Transactions() {
    const {t} = useTranslation();
    const [sort, setSort] = useState('desc');
    const [status, setStatus] = useState('all');
    const {transactions, loading, fetch} = useTransactionsStore()
    const {fetch: fetchCourses} = useCoursesStore()

    const navigate = useCustomNavigate();

    function handleNavigateToDetail(orderId, midTransData) {
        navigate('/transactions/detail#top', {
            orderId: orderId,
            data: JSON.parse(midTransData)
        })
    }

    function refreshData(paramPage, paramSort, paramStatus) {
        fetch(paramPage, paramSort, paramStatus)
        setSort(paramSort)
        setStatus(paramStatus)
    }

    return (
        <>
            {loading ? <div className={'loading-spinner'}></div> :
                <>
                    <FilterByComp filters={['settlement', 'deny', 'pending', 'cancel', 'expire', 'failure', 'all']}
                                  name={'status'}
                                  defaultValue={status}
                                  handleOnChange={value => refreshData(1, sort, value)}
                    />
                    {transactions?.total > 0 ?
                        <>
                            <div className={'flex-aic-jce gap-m'}>
                                <FilterByComp filters={['asc', 'desc']}
                                              name={'sort'}
                                              defaultValue={sort}
                                              handleOnChange={value => refreshData(1, value, status)}
                                />
                            </div>

                            <div className={'button bg-primary'} onClick={() => {
                                fetch(1, 'desc', 'all')
                                fetchCourses(1, 'desc')
                            }}>Refresh Data
                            </div>

                            <div className={'table-box'}>
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>{t('status')}</th>
                                        <th>{t('amount')}</th>
                                        <th>{t('created_at')}</th>
                                        <th>{t('action')}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {transactions?.data.map((value, index) => (
                                        <tr key={index}>
                                            <td>{value.order_id}</td>
                                            <td className={`text-center capitalize flex-aic-jcc`}>
                                                <div
                                                    className={`badge badge-small ${value.status === 'settlement' ? 'bg-success' : 'bg-warning'}`}>
                                                    {value.status}
                                                </div>
                                            </td>
                                            <td className={'text-center'}>{formatNumber(value.amount)}</td>
                                            <td className={'text-center'}>{value.created_at}</td>
                                            <td className={'action'}>
                                                <div className={'text-primary'}
                                                     onClick={() => handleNavigateToDetail(value.order_id, value.midtrans_data)}>
                                                    {t('detail')}
                                                </div>
                                            </td>
                                        </tr>
                                    ))}
                                    </tbody>
                                </table>
                            </div>
                            <PaginationComp data={transactions?.meta}
                                            onPageChange={page => refreshData(page, sort, status)}/>
                        </> :
                        <HashLink
                            smooth
                            className={'button btn-primary'}
                            to={'/courses#top'}
                        >{t('add')} {t('transaction')}</HashLink>}
                </>
            }
        </>
    )
}