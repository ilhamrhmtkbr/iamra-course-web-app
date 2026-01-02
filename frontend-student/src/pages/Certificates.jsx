import {useTranslation} from "react-i18next";
import {useState} from "react";
import {HashLink} from "react-router-hash-link";
import FilterByComp from "../components/FilterByComp.jsx";
import PaginationComp from "../components/PaginationComp.jsx";
import useStudent from "../hooks/useStudent.js";
import ToastComp from "../components/ToastComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import NoDataComp from "../components/NoDataComp.jsx";
import {useCertificatesStore} from "../zustand/store.js";

export default function Certificates() {
    const {success, errors, loading, handleClose, handleCertificateDownload} = useStudent();
    const {t} = useTranslation();
    const [sort, setSort] = useState('desc')
    const navigate = useCustomNavigate();
    const {certificates, loading: loadingCertificates, fetch} = useCertificatesStore();

    function handleNavigateToDetail(certId) {
        navigate('/certificate#top', {certId})
    }

    function refreshData(paramPage, paramSort) {
        fetch(paramPage, paramSort)
        setSort(paramSort);
    }

    return (
        <>
            {(success || errors) &&
                <ToastComp msg={success || errors.message} type={success ? 'success' : 'danger'}
                           handleOnClose={handleClose}/>}

            {loadingCertificates ? <div className={'loading-spinner'}></div> :
                certificates?.total > 0 ?
                    <>
                        <FilterByComp
                            filters={['asc', 'desc']}
                            name={'sort'}
                            defaultValue={sort}
                            handleOnChange={value => refreshData(1, value)}
                        />
                        <div className={'card-layout'}>
                            {certificates?.data.map((value, index) => (
                                <article className={'card-wrapper text-center'} key={index}>
                                    <p className={'font-size-l'}>{t('certificate_card_text_1')}</p>
                                    <p className={'font-size-xs font-light'}>{t('certificate_card_text_2')}</p>
                                    <p className={'font-medium'}>{value?.student?.user?.full_name}</p>
                                    <p className={'font-size-xs font-light'}>{t('certificate_card_text_3')}</p>
                                    <p className={'font-medium'}>{value?.instructor_course?.title}</p>
                                    <p className={'font-size-xs font-light'}>{t('on')} {value?.created_at}</p>
                                    <div className={'card-wrapper-actions'}>
                                        <div className={'text-primary'}
                                             onClick={() => handleNavigateToDetail(value.id)}>{t('detail')}</div>
                                        {loading ? <div className={'text-primary'}>Loading...</div> :
                                            <div className={'text-success'}
                                                 onClick={() => handleCertificateDownload(value.id)}>Download</div>}
                                    </div>
                                </article>
                            ))}
                        </div>
                        <PaginationComp data={certificates?.links} onPageChange={page => refreshData(page, sort)}/>
                    </> :
                    <>
                        <HashLink smooth
                                  to={'/progresses#top'}
                                  className={'button btn-primary'}
                        >{t('add')} {t('certificates')}</HashLink>
                        <NoDataComp message={t('you_havent_added_data_yet')}/>
                    </>
            }
        </>
    )
}