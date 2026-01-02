import useMember from "../hooks/useMember.js";
import {useEffect, useState} from "react";
import SubmitComp from "../components/SubmitComp.jsx";
import ToastComp from "../components/ToastComp.jsx";
import {useTranslation} from "react-i18next";
import useAuthStore from "../zustand/store.js";
import {useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup";
import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";
import {memberUpdateAuthenticationSchema} from "../yup/validationSchema.js";
import Stepper from "../components/Stepper.jsx";

export default function MemberUpdateAuthentication() {
    const user = useAuthStore(state => state.user);
    const [showPassword, setShowPassword] = useState(false);

    const {t} = useTranslation();
    const {
        errorsFromBackend, success, setSuccess, loading,
        handleAuthentication,
    } = useMember();

    const {
        register,
        handleSubmit,
        formState: {errors: errorsYup},
        reset,
    } = useForm({
        resolver: yupResolver(memberUpdateAuthenticationSchema(t))
    })

    useEffect(() => {
        if (user) {
            reset({
                username: user.username || ""
            })
        }
    }, [user, success]);

    function closeMessage() {
        setSuccess('')
        reset({
            old_password: '',
            new_password: ''
        })
    }

    return (
        <>
            {success && <ToastComp msg={success} type={'success'} handleOnClose={closeMessage}/>}
            <Stepper user={user} t={t}/>
            <form className={'card-wrapper replace-shadow-with-border h-max-content'}
                  onSubmit={handleSubmit(data => handleAuthentication(data))}>
                <h2>{t('authentication')}</h2>
                {typeof errorsFromBackend === "string" &&
                    <p className={'text-error-msg'}>{errorsFromBackend}</p>}

                <div className="max-width-500">
                    <label htmlFor="username">{t('username')}</label>
                    <input type="text" id="username"
                           {...register("username")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup}
                                           errorsFromBackend={errorsFromBackend} field={"username"}/>
                </div>

                <div className="max-width-500">
                    <label htmlFor="old_password">{t('old_password')}</label>
                    <input type={!showPassword ? "password" : "text"} id="old_password"
                           {...register("old_password")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup}
                                           errorsFromBackend={errorsFromBackend} field={"old_password"}/>
                </div>

                <div className="max-width-500">
                    <label htmlFor="new_password">{t('new_password')}</label>
                    <input type={!showPassword ? "password" : "text"} id="new_password"
                           {...register("new_password")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup}
                                           errorsFromBackend={errorsFromBackend} field={"new_password"}/>
                </div>

                <div className={"flex-aic-jcs gap-s"}>
                    <input name={"show-pw"}
                           id={"show-pw"}
                           className={"input-clear-style w-max-content"}
                           type="checkbox"
                           checked={showPassword}
                           onChange={(e) => setShowPassword(e.target.checked)}/>
                    <small>{t('show_password')}</small>
                </div>

                <SubmitComp isLoading={loading}/>
            </form>
        </>
    )
}