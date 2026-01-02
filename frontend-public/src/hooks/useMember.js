import {memberCourseLikeModify} from "../services/service.js";
import {useState} from "react";

const useMember = () => {
    const [success, setSuccess] = useState('');
    const [errors, setErrors] = useState(null);
    const [loading, setLoading] = useState(false);

    const handleClose = () => {
        setErrors(null);
        setSuccess('');
    }

    const handleMemberCourseLikeModify = async (courseId) => {
        handleClose();
        setLoading(true);
        try {
            const {data} = await memberCourseLikeModify({id: courseId});
            setSuccess(data?.message);
        } catch ({response}) {
            setErrors(response?.data?.message);
        } finally {
            setLoading(false);
        }
    }

    return {success, errors, loading, handleClose, handleMemberCourseLikeModify}
}

export default useMember