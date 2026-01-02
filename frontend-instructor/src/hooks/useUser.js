import {useState} from "react";
import {memberApi} from "../services/api.js";

const usePublic = () => {
    const [loading, setLoading] = useState(false);
    const [success, setSuccess] = useState('');
    const [errors, setErrors] = useState(null);

    const handleClose = () => {
        setSuccess('');
        setErrors(null);
    }

    const handleResumeDownload = async (resumeId) => {
        const resume = resumeId.replace(".pdf", "");

        // Buat URL API download
        const downloadUrl = import.meta.env.VITE_APP_BACKEND_USER_API_URL + `/public/instructor/download-resume?id=${resume}`;

        // Buka URL tersebut (akan memicu download langsung dari browser)
        window.open(downloadUrl, '_blank');
    }

    return {
        loading, success, errors, handleClose,
        handleResumeDownload
    }
}

export default usePublic;