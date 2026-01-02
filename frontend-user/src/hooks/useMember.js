import {useState} from "react";
import {
    additionalInfoModify,
    authenticationModify,
    emailStore,
    instructorStore,
    studentStore,
} from "../services/memberService.js";
import {refreshToken} from "../services/authService.js";
import {useCustomNavigate} from "../utils/Helper.js";

const useMember = () => {
    const [loading, setLoading] = useState(false);
    const [errorsFromBackend, setErrorsFromBackend] = useState(null);
    const [success, setSuccess] = useState('');

    const handleClose = () => {
        setErrorsFromBackend(null);
        setSuccess('');
    }

    const handleAdditionalInfo = async (form) => {
        handleClose();
        setLoading(true)
        try {
            const res = await additionalInfoModify(form);
            if (res.data.success) {
                await refreshToken()
            }
            setSuccess(res.data.message);
        } catch ({response}) {
            setErrorsFromBackend(response.data.errors);
        } finally {
            setLoading(false);
        }
    }

    const handleAuthentication = async (form) => {
        handleClose();
        setLoading(true)
        try {
            const res = await authenticationModify(form);
            if (res.data.success) {
                await refreshToken()
            }
            setSuccess(res.data.message);
        } catch ({response}) {
            if (response.data.errors) {
                setErrorsFromBackend(response.data.errors);
            } else {
                setErrorsFromBackend(response.data.message)
            }
        } finally {
            setLoading(false);
        }
    }

    const handleEmail = async (form) => {
        handleClose();
        setLoading(true)
        try {
            const res = await emailStore(form);
            if (res.data.success) {
                await refreshToken()
            }
            setSuccess(res.data.message);
        } catch ({response}) {
            if (response.data.errors) {
                setErrorsFromBackend(response.data.errors);
            } else {
                setErrorsFromBackend(response.data.message);
            }
        } finally {
            setLoading(false);
        }
    }

    const handleStudentRegister = async (form, callback) => {
        handleClose();
        setLoading(true);
        try {
            const {data} = await studentStore(form);
            if (data?.success) {
                await refreshToken()
                setSuccess(data.message);
                callback();
            }
        } catch ({response}) {
            setErrorsFromBackend(response.data.errors);
        } finally {
            setLoading(false);
        }
    }

    const handleInstructorRegister = async (form, callback) => {
        handleClose();
        setLoading(true);
        const formData = new FormData();
        formData.append("role", "instructor");
        formData.append("resume", form.resume);
        formData.append("summary", form.summary);

        try {
            const {data} = await instructorStore(formData);
            if (data?.success) {
                await refreshToken();
                setSuccess(data?.message);
                callback();
            }
        } catch ({response}) {
            setErrorsFromBackend(response.data.errors);
        } finally {
            setLoading(false);
        }
    }


    const navigate = useCustomNavigate()

    const navToRoleRegister = (user, t)  => {
        if (user?.email_verified_at) {
            navigate('/member/role-register#top')
        } else {
            alert(t('email_hasnt_verified'));
        }
    }

    return {
        loading, errorsFromBackend, success, setSuccess, handleClose,
        handleAdditionalInfo, handleAuthentication, handleEmail,
        handleStudentRegister, handleInstructorRegister, navToRoleRegister
    }
}

export default useMember;