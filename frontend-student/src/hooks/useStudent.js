import {
    cartDelete,
    certificateDownload,
    certificateStore,
    courseProgressStore, courseReviewDelete, courseReviewModify, courseReviewStore,
    questionDelete,
    questionModify,
    questionStore,
    transactionCheckCoupon,
    transactionDelete,
    transactionStore
} from "../services/studentService.js";
import {useState} from "react";
import {useNavigate} from "react-router";
import {useTranslation} from "react-i18next";
import {
    useCartsStore,
    useCertificatesStore, useCoursesStore,
    useProgressesStore,
    useQuestionsStore,
    useReviewsStore,
    useTransactionsStore
} from "../zustand/store.js";

const useStudent = () => {
    const [success, setSuccess] = useState('');
    const [errors, setErrors] = useState(null);
    const [loading, setLoading] = useState(false);
    const navigate = useNavigate();
    const {t} = useTranslation();
    const {fetch: fetchCarts} = useCartsStore()
    const {fetch: fetchCertificates} = useCertificatesStore()
    const {fetch: fetchCourses} = useCoursesStore()
    const {fetch: fetchProgresses} = useProgressesStore()
    const {fetch: fetchReviews} = useReviewsStore()
    const {fetch: fetchQuestions} = useQuestionsStore()
    const {fetch: fetchTransactions} = useTransactionsStore()

    const handleClose = () => {
        setErrors(null);
        setSuccess('');
    }

    const handleCartRemove = async (cartId) => {
        handleClose();
        setLoading(true);
        try {
            const {data} = await cartDelete(cartId);
            if (data?.success){
                setSuccess(data?.message);
                await fetchCarts(1, 'desc');
            }
        } catch ({response}) {
            setErrors(response.data.message);
        } finally {
            setLoading(false);
        }
    }

    const handleTransactionCheckCoupon = async (e, courseId, callback) => {
        e.preventDefault();
        handleClose();
        setLoading(true);
        try {
            const {data} = await transactionCheckCoupon({course_id: courseId})
            if ('data' in data) {
                setSuccess(data?.message);
                callback(data?.data);
            } else {
                setSuccess(t('coupon_not_available'));
            }
        } catch ({response}) {
            setErrors(response.data.message);
        } finally {
            setLoading(false)
        }
    }

    const handleTransactionAdd = async (courseId, couponId = '') => {
        handleClose();
        setLoading(true);
        try {
            const {data} = await transactionStore({
                instructor_course_id: courseId,
                instructor_course_coupon: couponId
            })
            setSuccess(data?.message);
            setTimeout(async () => {
                if (data?.success){
                    await fetchTransactions(1, 'desc', 'all');
                    await fetchCourses(1, 'desc')
                    navigate('/transactions#top');
                }
            }, 500);
        } catch ({response}) {
            setErrors(response.data.message);
        } finally {
            setLoading(false);
        }
    }

    const handleTransactionCancel = async (orderId) => {
        handleClose();
        setLoading(true);

        try {
            const {data} = await transactionDelete(orderId);
            setSuccess(data?.message);
            setTimeout(async () => {
                if (data?.success) {
                    await fetchTransactions(1, 'desc', 'all');
                    navigate('/transactions#top');
                }
            }, 500);
        } catch ({response}) {
            setErrors(response.data.message);
        } finally {
            setLoading(false);
        }
    }

    const handleCourseProgressStore = async (instructor_course_id, instructor_section_id, instructor_section_title) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await courseProgressStore({
                instructor_course_id,
                instructor_section_id,
                instructor_section_title
            });
            setSuccess(data?.message);
            setTimeout(async () => {
                if (data?.success) {
                    await fetchProgresses(1)
                }
            }, 500);
        } catch ({response}) {
            setErrors(response.data.message);
        } finally {
            setLoading(false);
        }
    }

    const handleCertificateStore = async courseId => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await certificateStore({instructor_course_id: courseId});
            setSuccess(data?.message);
            setTimeout(async () => {
                if (data?.success) {
                    await fetchCertificates(1, 'desc')
                }
            }, 500);
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleCertificateDownload = async (certificateId) => {
        handleClose();

        setLoading(true);

        try {
            const res = await certificateDownload(certificateId);

            const url = window.URL.createObjectURL(new Blob([res.data]));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', `certificate-${certificateId}.pdf`); // Nama file
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            setSuccess(res.data.message);
        } catch ({response}) {
            setErrors(response.data.message);
        } finally {
            setLoading(false);
        }
    };

    const handleQuestionStore = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await questionStore(formData);
            setSuccess(data?.message);
            setTimeout(async () => {
                if (data?.success) {
                    await fetchQuestions(1, 'desc')
                }
            }, 500)
        } catch ({response}) {
            if (response?.data?.errors) {
                setErrors(response?.data?.errors);
            } else {
                setErrors(response?.data)
            }
        } finally {
            setLoading(false);
        }
    }

    const handleQuestionModify = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await questionModify(formData);
            setSuccess(data?.message);
            setTimeout(async () => {
                if (data?.success) {
                    await fetchQuestions(1, 'desc')
                }
            }, 500)
        } catch ({response}) {
            if (response?.data?.errors) {
                setErrors(response?.data?.errors);
            } else {
                setErrors(response?.data)
            }
        } finally {
            setLoading(false);
        }
    }

    const handleQuestionRemove = async questionId => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await questionDelete(questionId);
            setSuccess(data?.message);
            setTimeout(async () => {
                if (data?.success) {
                    await fetchQuestions(1, 'desc')
                }
            }, 500);
        } catch ({response}) {
            if (response?.data?.errors) {
                setErrors(response?.data?.errors);
            } else {
                setErrors(response?.data);
            }
        } finally {
            setLoading(false);
        }
    }

    const handleReviewStore = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await courseReviewStore(formData);
            setSuccess(data?.message);
            setTimeout(async () => {
                if (data?.success) {
                    await fetchReviews(1, 'desc')
                }
            }, 500);
        } catch ({response}) {
            if (response?.data?.errors) {
                setErrors(response?.data?.errors);
            } else {
                setErrors(response?.data);
            }
        } finally {
            setLoading(false);
        }
    }

    const handleReviewModify = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await courseReviewModify(formData);
            setSuccess(data?.message);
            setTimeout(async () => {
                if (data?.success) {
                    await fetchReviews(1, 'desc')
                }
            }, 500);
        } catch ({response}) {
            setErrors(response?.data?.message);
        } finally {
            setLoading(false);
        }
    }

    const handleReviewRemove = async id => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await courseReviewDelete(id);
            setSuccess(data?.message);
            setTimeout(async () => {
                if (data?.success) {
                    await fetchReviews(1, 'desc')
                }
            }, 500);
        } catch ({response}) {
            setErrors(response?.data?.message);
        } finally {
            setLoading(false);
        }
    }

    return {
        success, errors, loading, handleClose,
        handleCartRemove,
        handleTransactionCheckCoupon, handleTransactionAdd, handleTransactionCancel,
        handleCourseProgressStore,
        handleCertificateStore, handleCertificateDownload,
        handleQuestionStore, handleQuestionModify, handleQuestionRemove,
        handleReviewStore, handleReviewModify, handleReviewRemove
    };
}

export default useStudent;