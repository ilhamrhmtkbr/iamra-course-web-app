import SubmitComp from "../components/SubmitComp.jsx";
import useAuth from "../hooks/useAuth.js";
import GoogleLoginComp from "../components/GoogleLoginComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import ToastComp from "../components/ToastComp.jsx";
import {memo, useState} from "react";
import {useTranslation} from "react-i18next";
import {useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup";
import {loginSchema, registerSchema} from "../yup/validationSchema.js";
import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";
import ReCAPTCHA from "react-google-recaptcha";
import useMediaQuery from "../hooks/useMediaQuery.js";

export default function Authentication() {
    const isMobile = useMediaQuery('(max-width: 800px)')
    const [lang, setLang] = useState('en')
    const {t, i18n} = useTranslation()
    const [formMode, setFormMode] = useState('login');
    const [captcha, setCaptcha] = useState(null);
    const {
        handleLogin, handleRegister, handleLoginWithGoogle,
        errorsFromBackend, setErrorsFromBackend, loading
    } = useAuth();
    const [showPassword, setShowPassword] = useState(false)

    const {
        register: registerRegister,
        handleSubmit: handleSubmitRegister,
        formState: {errors: errorsRegister},
    } = useForm({
        resolver: yupResolver(registerSchema(t))
    })

    const {
        register: registerLogin,
        handleSubmit: handleSubmitLogin,
        formState: {errors: errorsLogin},
    } = useForm({
        resolver: yupResolver(loginSchema(t))
    })

    const navigate = useCustomNavigate();

    function afterSuccess() {
        if (localStorage.getItem('last-page')) {
            window.location.href = localStorage.getItem('last-page')
        } else {
            navigate('/member/additional-info#top', {replace: true});
        }
    }

    function closeMessage() {
        setErrorsFromBackend({});
    }

    function handleChangeLang(param) {
        localStorage.setItem('lang', param);
        i18n.changeLanguage(param);
        setLang(param);
    }

    return (
        <main style={{
            background: "url('/bg-auth.jpg')",
            placeContent: 'center',
            backgroundRepeat: 'no-repeat',
            backgroundPosition: 'center',
            backgroundSize: 'cover',
            gridTemplateColumns: isMobile ? '1fr' : '1fr 1fr'
        }}>
            <div style={{
                backgroundColor: "rgba(0, 0, 0, 0.5)",
                backdropFilter: "blur(12px)",
                border: "1px solid rgba(255, 255, 255, 0.3)",
                display: isMobile ? "none" : "grid",
                alignItems: "flex-end",
                paddingLeft: "2rem",
                paddingRight: "2rem",
                textAlign: "center",
                borderRadius: "0.5rem",
                width: "90%",
                height: "90dvh",
                color: "white",
                boxSizing: "border-box",
            }}>
                <div className={'mb-x'}>
                    <br/>
                    <blockquote className={'font-size-4x font-medium'}>{t('authentication_great1')}</blockquote>
                    <p>{t('authentication_great2')}</p>
                    <br/>
                    <br/>
                    <div className={'flex-aic-jcb'}>
                        <a className={'button bg-primary'} href={import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL}>
                            {t('authentication_great3')}
                        </a>
                        <div className={'flex-aic-jcs gap-s'}>
                            <p>Lang : </p>
                            <div className={'flex-aic-jce gap-s'}>
                                <div style={{padding: '1px 4px'}}
                                     className={`flex-aic-jcc radius-s cursor-pointer text-hover-underline ${lang === 'id' ? 'bg-primary' : ''}`}
                                     onClick={() => handleChangeLang('id')}>Id
                                </div>
                                <div style={{padding: '1px 4px'}}
                                     className={`flex-aic-jcc radius-s cursor-pointer text-hover-underline ${lang === 'en' ? 'bg-primary' : ''}`}
                                     onClick={() => handleChangeLang('en')}>En
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                className={'card-wrapper ps-center bg-white justify-center box-border'}
                style={{
                    background: 'var(--bg-color)',
                    width: isMobile ? "95%" : "80%",
                    maxHeight: "80dvh",
                    padding: "7dvh 1rem",
                    overflow: 'auto'
                }}>
                <div className={'flex-aic-jcc gap-m mb-m font-light font-size-2x'}>
                    <div
                        className={`cursor-pointer text-hover-underline ${formMode === 'login' ? 'underline font-medium' : ''}`}
                        onClick={() => setFormMode('login')}>Login
                    </div>
                    <div
                        className={`cursor-pointer text-hover-underline ${formMode === 'register' ? 'underline font-medium' : ''}`}
                        onClick={() => setFormMode('register')}>Register
                    </div>
                </div>

                <a className={'text-primary text-hover-underline'} href={import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL}>
                    {t('authentication_great3')}
                </a>

                {errorsFromBackend?.message &&
                    <ToastComp type={'danger'} msg={errorsFromBackend?.message} handleOnClose={closeMessage}/>}

                <ReCAPTCHA
                    sitekey={import.meta.env.VITE_API_KEY_RECAPTCHA}
                    onChange={token => setCaptcha(token)}
                />

                {formMode === 'login' ?
                    <LoginForm errorsFromBackend={errorsFromBackend} handleLogin={handleLogin} captcha={captcha}
                               afterSuccess={afterSuccess} setFormMode={setFormMode}
                               loading={loading} t={t} showPassword={showPassword} setShowPassword={setShowPassword}
                               register={registerLogin} handleSubmit={handleSubmitLogin} errorsYup={errorsLogin}
                    /> :
                    <RegisterForm errorsFromBackend={errorsFromBackend} handleRegister={handleRegister}
                                  captcha={captcha}
                                  afterSuccess={afterSuccess} setFormMode={setFormMode}
                                  loading={loading} t={t} showPassword={showPassword} setShowPassword={setShowPassword}
                                  register={registerRegister} handleSubmit={handleSubmitRegister}
                                  errorsYup={errorsRegister}
                    />
                }
                <GoogleLoginComp handleInputOnChange={e => handleLoginWithGoogle(e.credential, afterSuccess, captcha)}/>
            </div>
        </main>
    )
}

const LoginForm = memo((
    {
        errorsFromBackend,
        setFormMode,
        handleLogin, captcha, afterSuccess, loading, t,
        showPassword, setShowPassword,
        register, handleSubmit, errorsYup
    }
) => {
    const onSubmit = data => {
        handleLogin(data, afterSuccess, captcha)
    }

    return (
        <form className={'grid-start'}
              onSubmit={handleSubmit(onSubmit)}>
            <div className="max-width-500">
                <div className="form-like-google">
                    <input className="form-like-google-input" type="text"
                           placeholder=" " id="username"
                           {...register("username")}/>
                    <label className="form-like-google-label" htmlFor="username">{t('username')}</label>
                </div>
                <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field="username"/>
            </div>
            <div className="max-width-500">
                <div className="form-like-google">
                    <input className="form-like-google-input" type={!showPassword ? "password" : "text"}
                           placeholder=" " id="password"
                           {...register("password")}/>
                    <label className="form-like-google-label" htmlFor="password">{t('password')}</label>
                </div>
                <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field="password"/>
            </div>
            <div className={"flex-aic-jcs gap-s"}>
                <input name={"show-pw"}
                       id={"show-pw"}
                       className={"input-clear-style w-max-content"}
                       type="checkbox"
                       checked={showPassword}
                       onChange={(e) => setShowPassword(e.target.checked)}/>
                <label htmlFor={'show-pw'}
                       className={'font-light font-size-s cursor-pointer'}>{t('show_password')}</label>
            </div>
            <SubmitComp name={'Login'} isLoading={loading} isCenter/>
            <div className={'flex-aic-jcc gap-s font-size-s'}>
                <p>{t('authentication_register_question')}</p>
                <div className={'text-primary text-hover-underline font-medium cursor-pointer'}
                     onClick={() => setFormMode('register')}
                >Register {t('now')}
                </div>
            </div>
        </form>
    )
})

const RegisterForm = memo((
    {
        errorsFromBackend,
        setFormMode,
        handleRegister, captcha, afterSuccess, loading, t,
        showPassword, setShowPassword,
        register, handleSubmit, errorsYup
    }
) => {

    const onSubmit = data => {
        handleRegister(data, afterSuccess, captcha)
    }

    return (
        <form className={'grid-start'}
              onSubmit={handleSubmit(onSubmit)}>
            {['first_name', 'middle_name', 'last_name', 'username'].map((field) => (
                <div key={field} className="max-width-500">
                    <div className="form-like-google">
                        <input
                            className="form-like-google-input"
                            type="text"
                            placeholder=" "
                            id={field}
                            {...register(field)}
                        />
                        <label className="form-like-google-label" htmlFor={field}>
                            {t(field)}
                        </label>
                    </div>
                    <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={field}/>
                </div>
            ))}

            <div className="max-width-500">
                <div className="form-like-google">
                    <input className="form-like-google-input"
                           type={!showPassword ? "password" : "text"}
                           placeholder=" " id="password"
                           {...register("password")}/>
                    <label className="form-like-google-label" htmlFor="password">{t('password')}</label>
                </div>
                <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend} field={"password"}/>
            </div>
            <div className="max-width-500">
                <div className="form-like-google">
                    <input className="form-like-google-input"
                           type={!showPassword ? "password" : "text"} placeholder=" " id="password_confirmation"
                           {...register("password_confirmation")}/>
                    <label className="form-like-google-label"
                           htmlFor="password_confirmation">{t('password_confirmation')}</label>
                </div>
                <ErrorInputMessageComp errorsYup={errorsYup} errorsFromBackend={errorsFromBackend}
                                       field={"password_confirmation"}/>
            </div>
            <div className={"flex-aic-jcs gap-s"}>
                <input name={"show-pw"}
                       id={"show-pw"}
                       className={"input-clear-style w-max-content"}
                       type="checkbox"
                       checked={showPassword}
                       onChange={(e) => setShowPassword(e.target.checked)}/>
                <label htmlFor={'show-pw'}
                       className={'font-light font-size-s cursor-pointer'}>{t('show_password')}</label>
            </div>
            < SubmitComp name={'Register'} isLoading={loading} isCenter/>
            <div className={'flex-aic-jcc gap-s font-size-s'}>
                <p>{t('authentication_login_question')}</p>
                <div className={'text-primary text-hover-underline font-medium cursor-pointer'}
                     onClick={() => setFormMode('login')}
                >Login {t('now')}
                </div>
            </div>
        </form>
    )
})
