import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";
import SubmitComp from "../components/SubmitComp.jsx";
import ToastComp from "../components/ToastComp.jsx";
import ModalComp from "../components/ModalComp.jsx";
import {logout} from "../services/authService.js";
import {useEffect, useRef, useState, useCallback} from "react";
import useAuthStore from "../zustand/store.js";
import {useTranslation} from "react-i18next";
import useMember from "../hooks/useMember.js";
import {useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup";
import {memberUpdateEmailSchema} from "../yup/validationSchema.js";
import useWebSocket from "../hooks/useWebSocket.js"
import Stepper from "../components/Stepper.jsx";
import Countdown from "../components/CountdownComp.jsx";

const MemberUpdateEmail = () => {
    const wsRef = useRef(null);
    const connectionAttempted = useRef(false);
    const isConnecting = useRef(false); // Prevent concurrent connections
    const user = useAuthStore(state => state.user);
    const [modalSuccessVerifyEmail, setModalSuccessVerifyEmail] = useState(false);
    const {t} = useTranslation();
    const {errorsFromBackend, success, setSuccess, loading, handleEmail} = useMember();
    const {reconnect} = useWebSocket();
    const [hasVerify, setHasVerify] = useState({
        step1: false,
        step2: false,
        step3: false,
    });

    const {
        register,
        handleSubmit,
        formState: {errors: errorsYup},
        reset
    } = useForm({
        resolver: yupResolver(memberUpdateEmailSchema(t))
    })

    // Memoize cleanup function
    const cleanupWebSocket = useCallback(() => {
        if (wsRef.current && wsRef.current.readyState !== WebSocket.CLOSED) {
            console.log('Cleaning up WebSocket connection');
            wsRef.current.close(1000, 'Component cleanup');
        }
        wsRef.current = null;
        connectionAttempted.current = false;
        isConnecting.current = false;
    }, []);

    // Memoize WebSocket connection function
    const connectWebSocket = useCallback(() => {
        if (!user?.username || isConnecting.current ||
            (wsRef.current && wsRef.current.readyState === WebSocket.OPEN)) {
            return;
        }

        if (!connectionAttempted.current) {
            console.log('Initiating WebSocket connection for user:', user.username);
            connectionAttempted.current = true;
            isConnecting.current = true;

            try {
                reconnect(wsRef, user.username, setModalSuccessVerifyEmail);
            } finally {
                isConnecting.current = false;
            }
        }
    }, [user?.username, reconnect, setModalSuccessVerifyEmail]);

    // Initialize form data
    useEffect(() => {
        if (user) {
            reset({
                email: user.email || ""
            });

            if (user?.email) {
                setHasVerify(data => ({...data, step1: true}));
            }

            if (user?.email_verified_at) {
                setHasVerify(data => ({...data, step2: true, step3: true}));
            }
        }
    }, [user?.email, user?.email_verified_at, reset]);

    // WebSocket connection effect - separate from form initialization
    useEffect(() => {
        let timeoutId;

        if (user?.username && !connectionAttempted.current) {
            // Delay connection to avoid rapid reconnections
            timeoutId = setTimeout(() => {
                connectWebSocket();
            }, 100);
        }

        return () => {
            if (timeoutId) {
                clearTimeout(timeoutId);
            }
            cleanupWebSocket();
        };
    }, [user?.username, connectWebSocket, cleanupWebSocket]);

    // Success message effect
    useEffect(() => {
        if (success) {
            console.log('Success message received:', success);
        }
    }, [success]);

    // Cleanup on unmount
    useEffect(() => {
        return () => {
            cleanupWebSocket();
        };
    }, [cleanupWebSocket]);

    return (
        <>
            {modalSuccessVerifyEmail &&
                <ModalComp
                    title={'Verify Email'}
                    content={<p>{t('email_successfully_verified') + user?.full_name}</p>}
                    handleClose={async () => await logout()}
                />}

            {success && <ToastComp msg={success} type={'success'} handleOnClose={() => setSuccess('')}/>}
            <Stepper user={user} t={t}/>
            <form className={'card-wrapper replace-shadow-with-border h-max-content'}
                  onSubmit={handleSubmit(data => handleEmail(data))}>
                <h2>Email</h2>
                <div className="timeline">
                    <div className="timeline-item">
                        <div className={`timeline-key ${hasVerify.step1 ? 'active' : ''}`}>1</div>
                        <div className="timeline-content max-width-400">
                            <div className="timeline-content-title">
                                {t('member_email_timeline_1_title')}
                            </div>
                            <div className="timeline-content-desc">
                                {t('member_email_timeline_1_desc')}
                            </div>
                            <div className="timeline-content-time">
                                {t('member_email_timeline_1_time')}
                            </div>
                        </div>
                    </div>

                    <div className="timeline-divider"></div>

                    <div className="timeline-item">
                        <div className={`timeline-key ${hasVerify.step2 ? 'active' : ''}`}>2</div>
                        <div className="timeline-content max-width-400">
                            <div className="timeline-content-title">
                                {t('member_email_timeline_2_title')}
                            </div>
                            <div className="timeline-content-desc">
                                {t('member_email_timeline_2_desc')}
                            </div>
                            <div className="timeline-content-time">
                                {t('member_email_timeline_2_time')}
                            </div>
                        </div>
                    </div>

                    <div className="timeline-divider"></div>

                    <div className="timeline-item">
                        <div className={`timeline-key ${hasVerify.step3 ? 'active' : ''}`}>3</div>
                        <div className="timeline-content max-width-400">
                            <div className="timeline-content-title">
                                {t('member_email_timeline_3_title')}
                            </div>
                            <div className="timeline-content-desc">
                                {t('member_email_timeline_3_desc')}
                            </div>
                            <div className="timeline-content-time">
                                {t('member_email_timeline_3_time')}
                            </div>
                        </div>
                    </div>

                    <div className="timeline-divider"></div>

                    <div className="timeline-item">
                        <div className={`timeline-key ${hasVerify.step3 ? 'active' : ''}`}>4</div>
                        <div className="timeline-content max-width-400">
                            <div className="timeline-content-title">
                                {t('member_email_timeline_4_title')}
                            </div>
                            <div className="timeline-content-desc">
                                {t('member_email_timeline_4_desc')}
                            </div>
                            <div className="timeline-content-time">
                                {t('member_email_timeline_4_time')}
                            </div>
                        </div>
                    </div>
                </div>

                <br/>
                <br/>
                {typeof errorsFromBackend === "string" &&
                errorsFromBackend.includes('2') ? <>
                    <p className={'text-error-msg'}>{errorsFromBackend}</p>
                    <Countdown/>
                </> : <p className={'text-error-msg'}>{errorsFromBackend}</p>}

                <div className="max-width-500">
                    <label htmlFor="email">{t('email')}</label>
                    <input type="email" id="email"
                           {...register("email")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup}
                                           errorsFromBackend={errorsFromBackend} field={"email"}/>
                </div>

                <SubmitComp isLoading={loading}/>
            </form>
        </>
    )
}

export default MemberUpdateEmail;