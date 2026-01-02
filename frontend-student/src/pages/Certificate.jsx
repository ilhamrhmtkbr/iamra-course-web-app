import {useTranslation} from "react-i18next";
import CourseCardComp from "../components/CourseCardComp.jsx";
import {useLocation, useNavigate} from "react-router";
import {useEffect, useState} from "react";
import {certificateFetch} from "../services/studentService.js";
import {formatNumber} from "../utils/Helper.js";
import BackComp from "../components/BackComp.jsx";

export default function Certificate() {
    const {t} = useTranslation();
    const [loading, setLoading] = useState(false);
    const [certificate, setCertificate] = useState(null);

    const navigate = useNavigate();
    const location = useLocation();
    const {state} = location;

    useEffect(() => {
        if (state === null || (state && Object.keys(state).length === 0)) {
            navigate('/student/certificates#top');
        } else {
            (async () => {
                setLoading(true);

                try {
                    const {data} = await certificateFetch(state?.certId);
                    setCertificate(data?.data);
                } catch ({response}) {

                } finally {
                    setLoading(false);
                }
            })()
        }
    }, []);

    return (
        <>
            {loading ? <div className={'loading-spinner'}></div> : certificate &&
                <>
                    <div className={'flex-ais-jcs gap-m'}>
                        <CourseCardComp title={certificate.course?.title} desc={certificate.course?.description} image={certificate.course?.image}/>
                        <div className={'table-box'}>
                            <div className={'data-box'}>
                                <h3>{t('certificate')}</h3>
                                <div className={'data-content'}>
                                    <div className={'data-key'}>Id</div>
                                    <div className={'data-value'}>{certificate.id}</div>
                                    <div className={'data-key'}>{t('created_at')}</div>
                                    <div className={'data-value'}>{certificate.created_at}</div>
                                </div>
                            </div>

                            <br/>
                            <br/>

                            <div className={'data-box'}>
                                <h3>{t('course')}</h3>
                                <div className={'data-content'}>
                                    <div className={'data-key'}>Id</div>
                                    <div className={'data-value'}>{certificate.course?.id}</div>
                                    <div className={'data-key'}>{t('price')}</div>
                                    <div className={'data-value'}>{formatNumber(certificate.course?.price)}</div>
                                    <div className={'data-key'}>{t('level')}</div>
                                    <div className={'data-value'}>{certificate.course?.level}</div>
                                </div>
                            </div>

                            <br/>
                            <br/>

                            <div className={'data-box'}>
                                <h3>{t('instructor')}</h3>
                                <div className={'data-content'}>
                                    <div className={'data-key'}>{t('full_name')}</div>
                                    <div className={'data-value'}>{certificate.instructor}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br/>
                    <br/>

                    <h2>Total Sections</h2>
                    <div className={'table-box'}>
                        <table>
                            <thead>
                            <tr>
                                <th>{t('id')}</th>
                                <th>{t('title')}</th>
                            </tr>
                            </thead>
                            <tbody>
                            {certificate?.course?.sections?.map((value, index) => (
                                <tr key={index}>
                                    <td>{value.id}</td>
                                    <td className={'text-center'}>{value.title}</td>
                                </tr>
                            ))}
                            </tbody>
                        </table>
                    </div>
                </>
            }
            <BackComp/>
        </>
    )
}