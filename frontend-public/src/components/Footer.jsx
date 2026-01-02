import {memo, useState} from "react";
import {useTranslation} from "react-i18next";

const Footer = memo(() => {
    const {t, i18n} = useTranslation();
    const [lang, setLang] = useState(i18n.language);

    function handleChangeLang(lang) {
        localStorage.setItem('lang', lang);
        i18n.changeLanguage(lang);
        setLang(lang);
    }

    return (
        <footer>
            <div className="grid-start">
                <img src={'/iamra-logo.svg'}
                     style={{
                         maxWidth: 31,
                         maxHeight: 31
                     }}
                     alt={import.meta.env.VITE_APP_NAME}/>
                <h1>iamra</h1>
                <p>Senen, Jakarta Pusat</p>
                <p>copyright &copy; <a className='text-primary text-hover-underline cursor-pointer'
                                       href={import.meta.env.VITE_APP_URL_PROFILE}>Ilham
                    Rahmat Akbar</a> 2025</p>
            </div>

            <div className="grid-start">
                <h2 className='font-mb-s'>My Contact</h2>
                <a className='text-hover-underline' target='_blank'
                   href={import.meta.env.VITE_LINK_GITHUB}>Github</a>
                <a className='text-hover-underline' target='_blank' href={import.meta.env.VITE_LINK_EMAIL}>Email</a>
                <a className='text-hover-underline' target='_blank'
                   href={import.meta.env.VITE_LINK_INSTAGRAM}>Instagram</a>
                <a className='text-hover-underline' target='_blank'
                   href={import.meta.env.VITE_LINK_WHATSAPP}>Whatsapp</a>
            </div>

            <div className="grid-start">
                <h2 className='font-mb-s'>Feature</h2>
                <a href={import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL + '/certificates#top'}
                   className={'text-hover-underline capitalize'}>
                    {t('certificate_verify')}
                </a>
                <a href={import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL}
                   className={'text-hover-underline capitalize'}>
                    {t('courses')}
                </a>
                <div className={'flex-aic-jcs gap-m'}>
                    <div>Lang:</div>
                    <div className={'flex-aic-jcs gap-s'}>
                        <div
                            className={`text-hover-underline cursor-pointer ${lang === 'id' ? 'bg-primary radius-s' : ''}`}
                            style={{
                                padding: '0 3px',
                                color: lang === 'id' ? 'white' : 'var(--text-color)'
                            }}
                            onClick={() => handleChangeLang('id')}>id
                        </div>
                        <div
                            className={`text-hover-underline cursor-pointer ${lang === 'en' ? 'bg-primary radius-s' : ''}`}
                            style={{
                                padding: '0 3px',
                                color: lang === 'en' ? 'white' : 'var(--text-color)'
                            }}
                            onClick={() => handleChangeLang('en')}>en
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    )
})

export default Footer