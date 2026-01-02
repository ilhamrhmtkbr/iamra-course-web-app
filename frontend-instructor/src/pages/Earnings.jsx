import {useTranslation} from "react-i18next";
import {HashLink} from "react-router-hash-link";
import {useState} from "react";
import PaginationComp from "../components/PaginationComp.jsx";
import FilterByComp from "../components/FilterByComp.jsx";
import {formatNumber} from "../utils/Helper.js";
import NoDataComp from "../components/NoDataComp.jsx";
import {useEarningsStore} from "../zustand/store.js";

export default function Earnings() {
    const {t} = useTranslation();
    const [sort, setSort] = useState('desc');
    const {earnings, fetch, loading} = useEarningsStore()

    function refreshData(paramPage, paramSort) {
        (async () => {
            await fetch(paramPage, paramSort)
        })()
        setSort(paramSort);
    }

    return (
        <>
            <HashLink to={'/earnings/account#top'}
                      className={'button bg-primary'}>{t('inst_earnings_button')}</HashLink>

            {loading ? <div className={'loading-spinner'}></div> :
                earnings?.meta?.total > 0 ?
                    <>
                        <FilterByComp
                            filters={['asc', 'desc']}
                            name={'sort'}
                            defaultValue={sort}
                            handleOnChange={value => refreshData(1, value)}
                        />

                        <div className={'button bg-primary'} onClick={() => refreshData(1, 'desc')}>
                            Refresh Data
                        </div>

                        <div className={'table-box'}>
                            <table>
                                <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>{t('title')}</th>
                                    <th>{t('student')}</th>
                                    <th>{t('amount')}</th>
                                    <th>{t('status')}</th>
                                    <th>{t('created_at')}</th>
                                </tr>
                                </thead>
                                <tbody>
                                {earnings?.data?.map((value, index) => (
                                    <tr key={index}>
                                        <td className={'text-center'}>{value.order_id}</td>
                                        <td>{value.instructor_course?.title}</td>
                                        <td>{value.student_full_name}</td>
                                        <td className={'text-center'}>{formatNumber(value.amount)}</td>
                                        <td className={'text-center capitalize flex-aic-jcc'}>
                                            <div className={`badge badge-small ${value.status === 'settlement' ? 
                                                'bg-success' : value.status === 'accepted' ? 'bg-primary' : 'bg-warning'}`}>
                                                {value.status}
                                            </div>
                                        </td>
                                        <td className={'text-center'}>{value.created_at}</td>
                                    </tr>
                                ))}
                                </tbody>
                            </table>
                        </div>
                        <PaginationComp data={earnings?.links?.meta} onPageChange={page => refreshData(page, sort)}/>
                    </> : <NoDataComp message={t('inst_earnings_no_data')}/>
            }
        </>
    )
}
