import {Outlet, useLocation} from "react-router";
import SetThemeComp from "../components/SetThemeComp.jsx";
import {HashLink} from "react-router-hash-link";
import GetMenuComp from "../components/GetMenuComp.jsx";
import {useTranslation} from "react-i18next";
import {useState} from "react";
import SvgComp from "../components/SvgComp.jsx";
import {useUserStore} from "../zustand/store.js";
import BreadcrumbsComp from "../components/BreadcrumbsComp.jsx";

const Layout = () => {
    const {t, i18n} = useTranslation();
    const [lang, setLang] = useState(i18n.language);
    const user = useUserStore(state => state.user)
    const [isMinifySidebar, setMinifySidebar] = useState(false);
    const location = useLocation()

    function handleChangeLang(lang) {
        localStorage.setItem('lang', lang);
        i18n.changeLanguage(lang);
        setLang(lang);
    }

    return (
        <>
            <header className={'header'}>
                <a className={'header-logo'} href={import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL}>
                    <img src={'/iamra-logo.svg'} className={'header-logo-img'} alt={import.meta.env.VITE_APP_NAME}/>
                    <span>{import.meta.env.VITE_APP_NAME}</span>
                </a>

                <SetThemeComp/>

                <GetMenuComp/>

                <div className={'navigation'}>
                    <a href={import.meta.env.VITE_APP_FRONTEND_USER_URL + '/member/additional-info#top'}
                       className={'hover-progress text-truncate'} style={{maxWidth: 111}}>{user?.username}</a>
                </div>
            </header>
            <nav>
                <a href={import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL} className={'flex-aic-jcc gap-s'}>
                    <SvgComp rule={'svg-m fill-text fill-blue-hover'} file={'sprite'} icon={'homepage'} />
                    <span className={'capitalize'}>{t('home')}</span>
                </a>
                <a href={import.meta.env.VITE_APP_FRONTEND_USER_URL + '/member/additional-info#top'}
                   className={'flex-aic-jcc gap-s'}>
                    <SvgComp rule={'svg-m fill-text fill-blue-hover'} file={'sprite'} icon={'setting'} />
                    <span>{t('setting')}</span>
                </a>
                <a href={import.meta.env.VITE_APP_FRONTEND_FORUM_URL} className={'flex-aic-jcc gap-s'}>
                    <SvgComp rule={'svg-m fill-text fill-blue-hover'} file={'sprite'} icon={'forum'} />
                    <span>{t('forum')}</span>
                </a>
            </nav>
            <main className={`has-sidebar ${isMinifySidebar ? 'active' : ''}`}>
                <section>
                    <BreadcrumbsComp/>
                    <Outlet/>
                </section>
                <aside className={`sidebar-menu`}>
                    <div className={'sidebar-menu-content'}>
                        <div className="sidebar-menu-title sidebar-menu-item"
                             onClick={() => setMinifySidebar(prevState => !prevState)}>
                            <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'click'}/>
                            <p>Menu</p>
                        </div>
                        <div className="sidebar-menu-element">
                            <a className={'sidebar-menu-item'} data-title={t('Homepage')}
                               href={import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL}>
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'homepage'}/>
                                <p>{t('Homepage')}</p>
                            </a>
                            <HashLink className={`sidebar-menu-item ${location.pathname === '/' ? 'active' : ''}`}
                                      data-title={t('profile')} to="/#top">
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'profile'}/>
                                <p>{t('profile')}</p>
                            </HashLink>
                            <HashLink
                                className={`sidebar-menu-item ${location.pathname === '/courses' ? 'active' : ''}`}
                                data-title={t('courses')} to="/courses#top">
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'courses'}/>
                                <p>{t('courses')}</p>
                            </HashLink>
                            <HashLink
                                className={`sidebar-menu-item ${location.pathname === '/coupons' ? 'active' : ''}`}
                                data-title={t('coupons')} to="/coupons#top">
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'coupons'}/>
                                <p>{t('coupons')}</p>
                            </HashLink>
                            <HashLink
                                className={`sidebar-menu-item ${location.pathname === '/answers' ? 'active' : ''}`}
                                data-title={t('answers')} to="/answers#top">
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'answers'}/>
                                <p>{t('answers')}</p>
                            </HashLink>
                            <HashLink
                                className={`sidebar-menu-item ${location.pathname === '/reviews' ? 'active' : ''}`}
                                data-title={t('reviews')} to="/reviews#top">
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'reviews'}/>
                                <p>{t('reviews')}</p>
                            </HashLink>
                            <HashLink
                                className={`sidebar-menu-item ${location.pathname === '/earnings' ? 'active' : ''}`}
                                data-title={t('earnings')} to="/earnings#top">
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'earnings'}/>
                                <p>{t('earnings')}</p>
                            </HashLink>
                            <HashLink
                                className={`sidebar-menu-item ${location.pathname === '/socials' ? 'active' : ''}`}
                                data-title={t('socials')} to="/socials#top">
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'socials'}/>
                                <p>{t('socials')}</p>
                            </HashLink>
                            <a className={'sidebar-menu-item'} data-title={t('forum')}
                               href={import.meta.env.VITE_APP_FRONTEND_FORUM_URL}>
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'forum'}/>
                                <p>{t('forum')}</p>
                            </a>
                            <a className={'sidebar-menu-item'} data-title={t('setting')}
                               href={import.meta.env.VITE_APP_FRONTEND_USER_URL + '/member/additional-info#top'}>
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'setting'}/>
                                <p>{t('setting')}</p>
                            </a>
                        </div>
                    </div>
                </aside>
            </main>
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
                    <h2 className='font-medium mb-s'>My Contact</h2>
                    <a className='text-hover-underline' target='_blank'
                       href={import.meta.env.VITE_LINK_GITHUB}>Github</a>
                    <a className='text-hover-underline' target='_blank' href={import.meta.env.VITE_LINK_EMAIL}>Email</a>
                    <a className='text-hover-underline' target='_blank'
                       href={import.meta.env.VITE_LINK_INSTAGRAM}>Instagram</a>
                    <a className='text-hover-underline' target='_blank'
                       href={import.meta.env.VITE_LINK_WHATSAPP}>Whatsapp</a>
                </div>

                <div className="grid-start">
                    <h2 className='font-medium mb-s'>Feature</h2>
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
        </>
    )
}

export default Layout