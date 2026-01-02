import {useTranslation} from "react-i18next";

export default function NotFound() {
    const {t} = useTranslation();

    return (
        <div className={'flex-aic-jcc h-full-dvh'}>
            <div className={'grid-custom'}>
                <h1>Not Found</h1>
                <p>{t('page_not_found')}</p>
                <a href={import.meta.env.VITE_APP_FRONTEND_PUBLIC}
                   className={'button bg-primary'}>
                    {t('visit')}
                </a>
            </div>
        </div>
    )
}

