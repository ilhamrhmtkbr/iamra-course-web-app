import {studentCartStore} from "../services/service.js";
import {useState} from "react";

const useStudent = () => {
    const [success, setSuccess] = useState('');
    const [errors, setErrors] = useState(null);
    const [loading, setLoading] = useState(false);

    const handleClose = () => {
        setErrors(null);
        setSuccess('');
    }

    const handleCartStore = async (courseId) => {
        handleClose();
        setLoading(true);
        try {
            const res = await studentCartStore({instructor_course_id: courseId});
            setSuccess(res?.data?.message);
        } catch ({response}) {
            setErrors(response?.data?.message);
        } finally {
            setLoading(false);
        }
    }

    return {
        success, errors, loading, handleClose,
        handleCartStore
    };
}

export default useStudent;