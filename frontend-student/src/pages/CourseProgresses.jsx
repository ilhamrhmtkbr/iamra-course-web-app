import {useTranslation} from "react-i18next";
import useStudent from "../hooks/useStudent.js";
import ToastComp from "../components/ToastComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import NoDataComp from "../components/NoDataComp.jsx";
import {useProgressesStore} from "../zustand/store.js";

export default function CourseProgresses() {
    const {t} = useTranslation();
    const {loading: loadingStoreCertificate, handleCertificateStore, success, errors, handleClose} = useStudent()
    const {loading, progresses} = useProgressesStore()

    const navigate = useCustomNavigate();

    function handleNavigateToDetail(courseId, completedSections, totalSections) {
        navigate('/progress-detail#top', {
            courseId,
            completedSections,
            totalSections
        })
    }

    function handleAfterClose() {
        handleClose();
        navigate('/certificates#top');
    }

    return (
        <>
            {(success || errors) &&
                <ToastComp msg={success || errors.message} type={success ? 'success' : 'danger'}
                           handleOnClose={handleAfterClose}/>}

            {loading ? <div className={'loading-spinner'}></div> :
                progresses?.total > 0 ?
                    <div className={'table-box'}>
                        <table>
                            <thead>
                            <tr>
                                <th>{t('course_title')}</th>
                                <th>{t('completed_sections')}</th>
                                <th>{t('total_sections')}</th>
                                <th>{t('action')}</th>
                            </tr>
                            </thead>
                            <tbody>
                            {progresses?.data.map((value, index) => (
                                <tr key={index}>
                                    <td>{value.instructor_course?.title}</td>
                                    <td className={'text-center'}>{Object.keys(value.sections).length}</td>
                                    <td className={'text-center'}>{value.instructor_course?.sections?.length}</td>
                                    <td className={'action'}>
                                        <div className={'text-primary'}
                                             onClick={() => handleNavigateToDetail(value.instructor_course_id,
                                                 Object.keys(value.sections).length, value.instructor_course?.sections?.length)}>{t('detail')}</div>
                                        {loadingStoreCertificate ? <p className={'text-primary'}>Loading...</p> :
                                            <div className={'text-success'}
                                                 onClick={() => handleCertificateStore(value.instructor_course_id)}>{t('add')} {t('certificate')}</div>}
                                    </td>
                                </tr>
                            ))}
                            </tbody>
                        </table>
                    </div> :
                    <NoDataComp message={t('stud_course_progresses_warning')}/>
            }
        </>
    )
}