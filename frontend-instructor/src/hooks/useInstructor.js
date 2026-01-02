import {useState} from "react";
import {
    courseDelete,
    courseModify,
    courseStore,
    lessonModify,
    lessonStore,
    lessonDelete,
    sectionDelete,
    sectionStore,
    sectionModify,
    answerStore,
    answerModify,
    accountStore,
    accountModify,
    earningPayout,
    courseCouponStore,
    courseCouponModify,
    courseCouponDelete,
    socialStore,
    socialModify,
    socialDelete
} from "../services/instructorService.js";
import {
    useAccountStore,
    useAnswersStore,
    useCourseCouponsStore,
    useCoursesStore,
    useSocialsStore
} from "../zustand/store.js";

const useInstructor = () => {
    const [loading, setLoading] = useState(false);
    const [success, setSuccess] = useState('');
    const [errors, setErrors] = useState(null);
    const {fetch: coursesFetch} = useCoursesStore()
    const {fetch: answersFetch} = useAnswersStore()
    const {fetch: accountFetch} = useAccountStore()
    const {fetch: coursesCouponFetch} = useCourseCouponsStore()
    const {fetch: socialsFetch} = useSocialsStore()

    const handleClose = () => {
        setSuccess('');
        setErrors(null);
    }

    const handleCourseStore = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await courseStore(formData);
            setSuccess(data?.message);
            if (data?.success) {
                setTimeout(() => {
                    (async () => {
                        await coursesFetch(1, 'desc')
                    })()
                }, 500);
            }
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleCourseModify = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await courseModify(formData);
            setSuccess(data?.message);
            if (data?.success) {
                setTimeout(() => {
                    (async () => {
                        await coursesFetch(1, 'desc')
                    })()
                }, 500);
            }
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleCourseDelete = async (courseId) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await courseDelete(courseId);
            setSuccess(data?.message);
            if (data?.success) {
                setTimeout(() => {
                    (async () => {
                        await coursesFetch(1, 'desc')
                    })()
                }, 500);
            }
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleSectionStore = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await sectionStore(formData);
            setSuccess(data?.message);
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleSectionModify = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await sectionModify(formData);
            setSuccess(data?.message);
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleSectionDelete = async sectionId => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await sectionDelete(sectionId);
            setSuccess(data?.message);
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleLessonStore = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await lessonStore(formData);
            setSuccess(data?.message);
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleLessonModify = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await lessonModify(formData);
            setSuccess(data?.message);
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleLessonDelete = async (sectionId, lessonId) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await lessonDelete(sectionId, lessonId);
            setSuccess(data?.message);
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleAnswerStore = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await answerStore(formData);
            setSuccess(data?.message);
            if (data?.success) {
                setTimeout(() => {
                    (async () => {
                        await answersFetch(1, 'desc')
                    })()
                }, 500);
            }
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleAnswerModify = async (formData) => {
        handleClose();

        try {
            const {data} = await answerModify(formData);
            setSuccess(data?.message);
            if (data?.success) {
                setTimeout(() => {
                    (async () => {
                        await answersFetch(1, 'desc')
                    })()
                }, 500);
            }
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }

    }

    const handleAccountStore = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await accountStore(formData);
            setSuccess(data?.message);
            if (data?.success) {
                setTimeout(() => {
                    (async () => {
                        await accountFetch()
                    })()
                }, 500);
            }
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleAccountModify = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await accountModify(formData);
            setSuccess(data?.message);
            if (data?.success) {
                setTimeout(() => {
                    (async () => {
                        await accountFetch()
                    })()
                }, 500);
            }
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleDisbursement = async () => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await earningPayout();
            setSuccess(data?.message);
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleCouponStore = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await courseCouponStore(formData);
            setSuccess(data?.message);
            if (data?.success) {
                setTimeout(() => {
                    (async () => {
                        await coursesCouponFetch(1, 'desc')
                    })()
                }, 500);
            }
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleCouponModify = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await courseCouponModify(formData);
            setSuccess(data?.message);
            if (data?.success) {
                setTimeout(() => {
                    (async () => {
                        await coursesCouponFetch(1, 'desc')
                    })()
                }, 500);
            }
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleCouponDelete = async couponId => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await courseCouponDelete(couponId);
            setSuccess(data?.message);
            if (data?.success) {
                setTimeout(() => {
                    (async () => {
                        await coursesCouponFetch(1, 'desc')
                    })()
                }, 500);
            }
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleSocialStore = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await socialStore(formData);
            setSuccess(data?.message);
            if (data?.success) {
                setTimeout(() => {
                    (async () => {
                        await socialsFetch()
                    })()
                }, 500);
            }
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleSocialModify = async (formData) => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await socialModify(formData);
            setSuccess(data?.message);
            if (data?.success) {
                setTimeout(() => {
                    (async () => {
                        await socialsFetch()
                    })()
                }, 500);
            }
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    const handleSocialDelete = async socialId => {
        handleClose();

        setLoading(true);

        try {
            const {data} = await socialDelete(socialId);
            setSuccess(data?.message);
            if (data?.success) {
                setTimeout(() => {
                    (async () => {
                        await socialsFetch()
                    })()
                }, 500);
            }
        } catch ({response}) {
            setErrors(response?.data);
        } finally {
            setLoading(false);
        }
    }

    return {
        loading, success, errors, handleClose,
        handleCourseStore, handleCourseModify, handleCourseDelete,
        handleSectionStore, handleSectionModify, handleSectionDelete,
        handleLessonStore, handleLessonModify, handleLessonDelete,
        handleAnswerStore, handleAnswerModify,
        handleAccountStore, handleAccountModify,
        handleDisbursement,
        handleCouponStore, handleCouponModify, handleCouponDelete,
        handleSocialStore, handleSocialModify, handleSocialDelete
    }
}

export default useInstructor;