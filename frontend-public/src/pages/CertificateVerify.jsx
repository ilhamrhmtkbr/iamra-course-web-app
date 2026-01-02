import {useTranslation} from "react-i18next";
import {useEffect, useState} from "react";
import api from "../services/api.js";
import ToastComp from "../components/ToastComp.jsx";
import CertificateCard from "../components/CertificateCard.jsx";
import {useLocation} from "react-router";

export default function CertificateVerify() {
    const {t} = useTranslation();
    const [id, setId] = useState('');
    const [success, setSuccess] = useState('');
    const [error, setError] = useState({});
    const [loading, setLoading] = useState(false);
    const [certificate, setCertificate] = useState({
        name: '',
        courseTitle: '',
        createdAt: ''
    });

    const getCertificate = async (certId = id) => {
        setError({});
        setSuccess('');
        setLoading(true);
        setCertificate({
            name: '',
            courseTitle: '',
            createdAt: ''
        });

        try {
            const res = await api.get('/student/certificate/verify?id=' + certId);
            const data = res?.data?.data;
            console.log(res)
            setCertificate({
                name: data?.student?.user?.full_name || '',
                courseTitle: data?.instructor_course?.title || '',
                createdAt: data?.created_at || ''
            });
            if (data === undefined || data === null) {
                setSuccess(t('certificate_verify_not_found'));
            } else {
                setSuccess(res.data.message)
            }
        } catch ({response}) {
            setError(response.data);
        } finally {
            setLoading(false);
        }
    }

    function useQuery() {
        return new URLSearchParams(useLocation().search);
    }


    const query = useQuery();

    useEffect(() => {
        const idParam = query.get('id');
        if (idParam) {
            setId(idParam);
            getCertificate(idParam);
        }
    }, []);


    return (
        <>
            <div className="stepper">
                <div className="stepper-item">
                    <div className="stepper-key active">1</div>
                    <div className="stepper-value">{t('student')}</div>
                </div>
                <div className="stepper-divider"></div>
                <div className="stepper-item">
                    <div className="stepper-key">2</div>
                    <div className="stepper-value">{t('certificate_stepper_1')}</div>
                </div>
                <div className="stepper-divider"></div>
                <div className="stepper-item">
                    <div className="stepper-key">3</div>
                    <div className="stepper-value">{t('certificate_stepper_2')}</div>
                </div>
            </div>
            {success && <ToastComp type={success.includes('found') ? 'danger' : 'success'} msg={success}
                                   handleOnClose={() => setSuccess('')}/>}
            <div className={'card-wrapper replace-shadow-with-border max-width-800'}>
                <h2>{t('certificate_verify')}</h2>

                <div className="max-width-500">
                    <label htmlFor="cert-id">{t('certificate_id')}</label>
                    <input name="cert-id" type="text" id="cert-id" onChange={e => setId(e.target.value)}/>
                    {error?.id && <p className={'text-error-msg'}>{error?.id && error?.id[0]}</p>}
                </div>

                {loading ?
                    <div className={'button bg-primary'}>Loading ..</div>
                    : <div className={'button bg-primary'} onClick={getCertificate}>
                        Submit
                    </div>
                }
            </div>
            <br/>
            {certificate?.name &&
                <CertificateCard
                    name={certificate.name}
                    courseTitle={certificate.courseTitle}
                    createdAt={certificate.createdAt}/>}
        </>
    )
}