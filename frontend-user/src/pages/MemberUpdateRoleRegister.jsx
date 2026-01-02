import {useEffect, useState} from "react";
import useMember from "../hooks/useMember.js";
import ToastComp from "../components/ToastComp.jsx";
import SubmitComp from "../components/SubmitComp.jsx";
import {useTranslation} from "react-i18next";
import useAuthStore from "../zustand/store.js";
import ErrorInputMessageComp from "../components/ErrorInputMessageComp.jsx";
import {useForm} from "react-hook-form";
import {yupResolver} from "@hookform/resolvers/yup";
import {instructorUpdateCreateSchema, studentUpdateCreateSchema} from "../yup/validationSchema.js";
import Stepper from "../components/Stepper.jsx";

export default function MemberUpdateRoleRegister() {
    const {t} = useTranslation();
    const {
        loading,
        errorsFromBackend,
        success,
        setSuccess,
        handleStudentRegister,
        handleInstructorRegister
    } = useMember();
    const [roleActive, setRoleActive] = useState('instructor');
    const user = useAuthStore(state => state.user);

    function afterSuccess() {
        window.location.href = import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL;
    }

    useEffect(() => {
        setRoleActive(user.role === 'user' ? 'instructor' : user.role);
        if (user.role === 'student') {
            resetStudentUpdateCreate({
                role: 'student',
                category: user?.category || "",
                summary: user?.summary || ""
            })
        } else if (user.role === 'instructor') {
            resetInstructorUpdateCreate({
                role: 'instructor',
                resume: '',
                summary: user?.summary || ""
            })
        } else {
            resetStudentUpdateCreate({
                role: 'student',
                category: '',
                summary: ''
            })

            resetInstructorUpdateCreate({
                role: 'instructor',
                resume: '',
                summary: ''
            })
        }

    }, [success]);

    const {
        register: registerStudentUpdateCreate,
        handleSubmit: handleSubmitStudentUpdateCreate,
        formState: {errors: errorsStudentUpdateCreate},
        reset: resetStudentUpdateCreate
    } = useForm({
        resolver: yupResolver(studentUpdateCreateSchema(t))
    })

    const {
        register: registerInstructorUpdateCreate,
        handleSubmit: handleSubmitInstructorUpdateCreate,
        formState: {errors: errorsInstructorUpdateCreate},
        reset: resetInstructorUpdateCreate,
        setValue
    } = useForm({
        resolver: yupResolver(instructorUpdateCreateSchema(t))
    })

    function setRole(roleName) {
        setRoleActive(roleName);
    }

    function closeMessage() {
        setSuccess('');
    }

    return (
        <>
            <Stepper user={user} t={t}/>
            <h2 >{t('role_register')}</h2>
            <div className={'flex-aic-jcs gap-m'}>
                <div className={`cursor-pointer ${roleActive === 'student' ? 'text-primary' : 'text-link'}`}
                     onClick={() => user?.role === 'user' && setRole('student')}>{t('student')}
                </div>
                <div>|</div>
                <div className={`cursor-pointer ${roleActive === 'instructor' ? 'text-primary' : 'text-link'}`}
                     onClick={() => user?.role === 'user' && setRole('instructor')}>{t('instructor')}
                </div>
            </div>

            {user?.resume &&
                <div className={'card-wrapper replace-shadow-with-border replace-shadow-with-border'}>
                    <h4>Old Resume</h4>
                    <p>{user?.resume}</p>
                </div>}

            {success && <ToastComp msg={success} type={'success'} handleOnClose={closeMessage}/>}

            {roleActive === 'student' ?
                <form className={'card-wrapper replace-shadow-with-border'}
                      onSubmit={handleSubmitStudentUpdateCreate(data => handleStudentRegister(data, afterSuccess))}>
                    <div className="max-width-500">
                        <label htmlFor="category">{t('category')}</label>
                        <select id="category"
                                {...registerStudentUpdateCreate('category')}>
                            <option value="">--</option>
                            <option value="learner">Learner</option>
                            <option value="employee">Employee</option>
                            <option value="jobless">Jobless</option>
                            <option value="undefined">Undefined</option>
                        </select>
                        <ErrorInputMessageComp errorsYup={errorsStudentUpdateCreate}
                                               errorsFromBackend={errorsFromBackend} field={"category"}/>
                    </div>
                    <div className="max-width-500">
                        <label htmlFor="summary">{t('summary')}</label>
                        <textarea id="summary" className="resize-none"
                                  {...registerStudentUpdateCreate('summary')}/>
                        <ErrorInputMessageComp errorsYup={errorsStudentUpdateCreate}
                                               errorsFromBackend={errorsFromBackend} field={"summary"}/>
                    </div>

                    <SubmitComp isLoading={loading}/>
                </form>
                : <form className={'card-wrapper replace-shadow-with-border'}
                        onSubmit={handleSubmitInstructorUpdateCreate(data => handleInstructorRegister(data, afterSuccess))}>
                    <div className="max-width-500">
                        <label htmlFor="resume">resume</label>
                        <input type="file" id="resume" accept="application/pdf"
                               onChange={(e) => setValue('resume', e.target.files?.[0])}/>
                        <ErrorInputMessageComp errorsYup={errorsInstructorUpdateCreate}
                                               errorsFromBackend={errorsFromBackend} field={"resume"}/>
                    </div>
                    <div className="max-width-500">
                        <label htmlFor="summary">{t('summary')}</label>
                        <textarea id="summary" className="resize-none" {...registerInstructorUpdateCreate("summary")}/>
                        <ErrorInputMessageComp errorsYup={errorsInstructorUpdateCreate}
                                               errorsFromBackend={errorsFromBackend} field={"summary"}/>
                    </div>

                    <SubmitComp isLoading={loading}/>
                </form>}
        </>
    )
}