import {useTranslation} from "react-i18next";
import {
    useCartsStore,
    useCertificatesStore,
    useCoursesStore,
    useQuestionsStore,
    useReviewsStore, useTransactionsStore,
    useUserStore
} from "../zustand/store.js";

export default function Profile() {
    const {t} = useTranslation();

    const {user, loading: userLoading} = useUserStore()
    const {carts, loading: cartsLoading} = useCartsStore()
    const {certificates, loading: certificatesLoading} = useCertificatesStore()
    const {courses, loading: coursesLoading} = useCoursesStore()
    const {reviews, loading: reviewsLoading} = useReviewsStore()
    const {questions, loading: questionsLoading} = useQuestionsStore()
    const {transactions, loading: transactionsLoading} = useTransactionsStore()

    return (
        userLoading ? 'Loading...' : user &&
            <>
                <img src={import.meta.env.VITE_APP_IMAGE_USER_URL +  user?.image} alt={'user'}
                     className={'picture-default'}/>
                {user?.summary &&
                    <div>
                        <h4>{t('summary')}</h4>

                        <summary>
                            {user?.summary}
                        </summary>
                    </div>}

                <h1>{t('action')}</h1>

                <div className={'card-layout w-full'}>
                    <div className={'card-wrapper replace-shadow-with-border'}>
                        <h3 className={'capitalize'}>{t('carts')}</h3>
                        <div className={'badge badge-small bg-primary text-white'}
                             >{cartsLoading ? 'Loading...' : carts?.total}</div>
                    </div>
                    <div className={'card-wrapper replace-shadow-with-border'}>
                        <h3 className={'capitalize'}>{t('certificates')}</h3>
                        <div className={'badge badge-small bg-primary text-white'}
                             >{certificatesLoading ? 'Loading...' : certificates?.total}</div>
                    </div>
                    <div className={'card-wrapper replace-shadow-with-border'}>
                        <h3 className={'capitalize'}>{t('courses')}</h3>
                        <div className={'badge badge-small bg-primary text-white'}
                             >{coursesLoading ? 'Loading...' : courses?.total}</div>
                    </div>
                    <div className={'card-wrapper replace-shadow-with-border'}>
                        <h3 className={'capitalize'}>{t('reviews')}</h3>
                        <div className={'badge badge-small bg-primary text-white'}
                             >{reviewsLoading ? 'Loading...' : reviews?.total}</div>
                    </div>
                    <div className={'card-wrapper replace-shadow-with-border'}>
                        <h3 className={'capitalize'}>{t('questions')}</h3>
                        <div className={'badge badge-small bg-primary text-white'}
                             >{questionsLoading ? 'Loading...' : questions?.total}</div>
                    </div>
                    <div className={'card-wrapper replace-shadow-with-border'}>
                        <h3 className={'capitalize'}>{t('transactions')}</h3>
                        <div className={'badge badge-small bg-primary text-white'}
                             >{transactionsLoading ? 'Loading...' : transactions?.total}</div>
                    </div>
                </div>

                <div className={'table-box'}>
                    <div className={'flex-ais-jcs gap-l'}>
                        <div className={'data-box'}>
                            <h2>Biography</h2>
                            <div className={'data-content'}>
                                <div className={'data-key'}>{t('username')}</div>
                                <div className={'data-value'}>: {user?.username}</div>
                                <div className={'data-key'}>{t('full_name')}</div>
                                <div className={'data-value'}>: {user?.full_name}</div>
                                <div className={'data-key'}>{t('email')}</div>
                                <div className={'data-value'}>: {user?.email}</div>
                                <div className={'data-key'}>{t('role')}</div>
                                <div className={'data-value'}>: {user?.role}</div>
                                <div className={'data-key'}>{t('address')}</div>
                                <div className={'data-value'}>: {user?.address ?? '-'}</div>
                                <div className={'data-key'}>{t('since')}</div>
                                <div className={'data-value'}>: {user?.since ?? '-'}</div>
                                <div className={'data-key'}>{t('dob')}</div>
                                <div className={'data-value'}>: {user?.dob ?? '-'}</div>
                                <div className={'data-key'}>{t('category')}</div>
                                <div className={'data-value'}>: {user?.category}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
    )
}