import {useState} from "react";
import {publicCourseFetch, publicCoursesFetch, publicCoursesSearch, publicSectionFetch} from "../services/service.js";

const usePublic = () => {
    const [courses, setCourses] = useState({});
    const [courseDetail, setCourseDetail] = useState(null);
    const [section, setSection] = useState(null);
    const [page, setPage] = useState(1);
    const [sort, setSort] = useState('new');
    const [level, setLevel] = useState('all');
    const [status, setStatus] = useState('all');
    const [keyword, setKeyword] = useState('');
    const [loading, setLoading] = useState(false);
    const [success, setSuccess] = useState('');
    const [errors, setErrors] = useState(null);

    const handleClose = () => {
        setSuccess('');
        setErrors(null);
    }

    const handleResumeDownload = (resumeId) => {
        const resume = resumeId.replace(".pdf", "");

        // Buat URL API download
        const downloadUrl = import.meta.env.VITE_APP_BACKEND_USER_API_URL + `/public/instructor/download-resume?id=${resume}`;

        // Buka URL tersebut (akan memicu download langsung dari browser)
        window.open(downloadUrl, '_blank');
    };

    const fetchCourses = async () => {
        setLoading(true);

        try {
            const {data} = await publicCoursesFetch(page, sort, level, status);
            setCourses(data)
        } catch (e) {

        } finally {
            setLoading(false)
        }
    }

    const searchCourses = async () => {
        setLoading(true);

        try {
            const {data} = await publicCoursesSearch(keyword);
            setCourses(data)
        } catch (e) {

        } finally {
            setLoading(false)
        }
    }

    const fetchCourseDetail = async id => {
        setLoading(true);

        try {
            const {data} = await publicCourseFetch(id);
            setCourseDetail(data?.data)
        } catch (e) {

        } finally {
            setLoading(false)
        }
    }

    const fetchSection = async courseId => {
        setLoading(true);

        try {
            const {data} = await publicSectionFetch(courseId);
            setSection(data?.data)
        } catch (e) {
            console.log(e)
        } finally {
            setLoading(false)
        }
    }

    return {
        courses, courseDetail, section, setSection,
        page, setPage,
        sort, setSort,
        level, setLevel,
        status, setStatus,
        keyword, setKeyword,
        loading,
        success, errors, handleClose,
        handleResumeDownload, fetchCourses, searchCourses, fetchCourseDetail, fetchSection
    }
}

export default usePublic