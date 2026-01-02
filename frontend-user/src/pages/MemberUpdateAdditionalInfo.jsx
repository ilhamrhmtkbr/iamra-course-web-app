import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";
import {Controller, useForm} from "react-hook-form";
import InputImageComp from "../components/input_image/InputImageComp.jsx";
import SubmitComp from "../components/SubmitComp.jsx";
import useAuthStore from "../zustand/store.js";
import {useTranslation} from "react-i18next";
import useMember from "../hooks/useMember.js";
import {yupResolver} from "@hookform/resolvers/yup";
import {memberUpdateAdditionalInfoSchema} from "../yup/validationSchema.js";
import {useEffect, useState} from "react";
import ToastComp from "../components/ToastComp.jsx";
import MapComp from "../components/MapComp.jsx";
import Stepper from "../components/Stepper.jsx";

const MemberUpdateAdditionalInfo = () => {
    const {t} = useTranslation();
    const user = useAuthStore(state => state.user);
    const [mapShow, setMapShow] = useState(false);
    const {
        errorsFromBackend, success, setSuccess, loading,
        handleAdditionalInfo
    } = useMember();

    const {
        register,
        handleSubmit,
        formState: {errors: errorsYup},
        reset,
        control,
        getValues,
        setValue
    } = useForm({
        resolver: yupResolver(memberUpdateAdditionalInfoSchema(t))
    })

    useEffect(() => {
        if (user) {
            let names = user.full_name.split(' ');
            let lastName = names[2]
            if (names.length > 3) {
                for (const [index, name] of names.entries()) {
                    if (index < 2) {
                        continue;
                    }
                    lastName += ' ' + name;
                }
            }

            reset({
                first_name: names[0] || "",
                middle_name: names[1] || "",
                last_name: lastName || "",
                image: user.image || "",
                dob: user.dob || "",
                address: user.address || ""
            })
        }
    }, [user, success]);

    return (
        <>
            <Stepper user={user} t={t}/>
            <form className={'card-wrapper replace-shadow-with-border h-max-content'}
                  onSubmit={handleSubmit(data => handleAdditionalInfo(data))}>
                {success && <ToastComp msg={success} type={'success'} handleOnClose={() => setSuccess('')}/>}

                <h2>{t('additional_info')}</h2>

                <div className="max-width-500">
                    <label htmlFor="first_name">{t('first_name')}</label>
                    <input type="text" id="first_name"
                           {...register("first_name")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup}
                                           errorsFromBackend={errorsFromBackend} field={"first_name"}/>
                </div>

                <div className="max-width-500">
                    <label htmlFor="middle_name">{t('middle_name')}</label>
                    <input type="text" id="middle_name"
                           {...register("middle_name")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup}
                                           errorsFromBackend={errorsFromBackend} field={"middle_name"}/>
                </div>

                <div className="max-width-500">
                    <label htmlFor="last_name">{t('last_name')}</label>
                    <input type="text" id="last_name"
                           {...register("last_name")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup}
                                           errorsFromBackend={errorsFromBackend} field={"last_name"}/>
                </div>

                <Controller name="image" control={control}
                            render={({field, fieldState}) => (
                                <InputImageComp name="image"
                                                oldImage={import.meta.env.VITE_APP_IMAGE_USER_URL + field.value}
                                                handleInputOnChange={field.onChange}
                                                error={fieldState.error?.message}
                                />
                            )}/>

                <div className="max-width-500">
                    <label htmlFor="dob">{t('dob')}</label>
                    <input type="date" id="dob"
                           {...register("dob")}/>
                    <ErrorInputMessageComp errorsYup={errorsYup}
                                           errorsFromBackend={errorsFromBackend} field={"dob"}/>
                </div>

                <div className="max-width-500" onClick={() => setMapShow(true)}>
                    <label htmlFor="address">{t('address')}</label>
                    <div className={'max-width-500 cursor-pointer p-m radius-s box-border border-style-default'}
                         style={{minHeight: 54}}>
                        {getValues('address')}
                    </div>
                    <ErrorInputMessageComp errorsYup={errorsYup}
                                           errorsFromBackend={errorsFromBackend} field={"address"}/>
                </div>

                <SubmitComp isLoading={loading}/>
            </form>
            <MapComp
                onChange={address => setValue('address', address)}
                mapShow={mapShow}
                setMapShow={setMapShow}
            />
        </>
    )
}

export default MemberUpdateAdditionalInfo;