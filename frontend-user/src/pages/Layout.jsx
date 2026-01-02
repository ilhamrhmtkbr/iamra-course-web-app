import {Outlet, useLocation} from "react-router";
import SvgComp from "../components/SvgComp.jsx";
import {HashLink} from "react-router-hash-link";
import {useState} from "react";
import {useTranslation} from "react-i18next";
import useAuthStore from "../zustand/store.js";
import {logout} from "../services/authService.js";
import SetThemeComp from "../components/SetThemeComp.jsx";
import GetMenuComp from "../components/GetMenuComp.jsx";
import useMember from "../hooks/useMember.js";

export default function Layout() {
    const {t, i18n} = useTranslation();
    const [lang, setLang] = useState(i18n.language);
    const location = useLocation();

    function handleChangeLang(lang) {
        localStorage.setItem('lang', lang);
        i18n.changeLanguage(lang);
        setLang(lang);
    }

    const [isMinifySidebar, setMinifySidebar] = useState(false);
    const user = useAuthStore.getState().user;

    const {navToRoleRegister} = useMember()

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
                    <a href={import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL}
                       className={'hover-progress'}
                    >
                        {t('courses')}
                    </a>
                </div>
            </header>
            <nav>
                <a href={import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL} className={'flex-aic-jcc gap-s'}>
                    <SvgComp rule={'svg-m fill-text fill-blue-hover'} file={'sprite'} icon={'homepage'} />
                    <span className={'capitalize'}>{t('home')}</span>
                </a>
                {user?.role !== 'user' &&
                    <a href={user.role === 'student' ?
                        import.meta.env.VITE_APP_FRONTEND_STUDENT_URL :
                        import.meta.env.VITE_APP_FRONTEND_INSTRUCTOR_URL}
                       className={'flex-aic-jcc gap-s'}>
                        <SvgComp rule={'svg-m fill-text fill-blue-hover'} file={'sprite'} icon={'profile'} />
                        <span>{t(user.role)}</span>
                    </a>
                }
                <a href={import.meta.env.VITE_APP_FRONTEND_FORUM_URL} className={'flex-aic-jcc gap-s'}>
                    <SvgComp rule={'svg-m fill-text fill-blue-hover'} file={'sprite'} icon={'forum'} />
                    <span>{t('forum')}</span>
                </a>
            </nav>

            <main className={`has-sidebar ${isMinifySidebar ? 'active' : ''}`}>
                <section>
                    <Outlet/>
                </section>
                <aside className={'sidebar-menu'}>
                    <div className={'sidebar-menu-content'}>
                        <div className="sidebar-menu-title sidebar-menu-item"
                             onClick={() => setMinifySidebar(prevState => !prevState)}>
                            <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'click'}/>
                            <p>Menu</p>
                        </div>

                        <div className="sidebar-menu-element">
                            {user?.role !== 'user' && user.role === 'instructor' ?
                                <a className={'sidebar-menu-item'} data-title={user?.role}
                                   href={import.meta.env.VITE_APP_FRONTEND_INSTRUCTOR_URL}>
                                    <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'profile'}/>
                                    <p>{user?.role}</p>
                                </a> : user?.role === 'student' &&
                                <a className={'sidebar-menu-item'} data-title={user?.role}
                                   href={import.meta.env.VITE_APP_FRONTEND_STUDENT_URL}>
                                    <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'profile'}/>
                                    <p>{user?.role}</p>
                                </a>
                            }
                            <HashLink
                                className={`sidebar-menu-item ${location.pathname.includes('additional-info') ? 'active' : ''}`}
                                data-title={t('additional_info')} to="/member/additional-info#top">
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'additional-info'}/>
                                <p>{t('additional_info')}</p>
                            </HashLink>
                            <HashLink
                                className={`sidebar-menu-item ${location.pathname.includes('authentication') ? 'active' : ''}`}
                                data-title={t('authentication')} to="/member/authentication#top">
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'authentication'}/>
                                <p>{t('authentication')}</p>
                            </HashLink>
                            <HashLink className={`sidebar-menu-item ${location.pathname.includes('email') ? 'active' : ''}`}
                                      data-title="Email" to="/member/email#top">
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'email'}/>
                                <p>{t('email')}</p>
                            </HashLink>
                            <div
                                className={`sidebar-menu-item ${location.pathname.includes('role-register') ? 'active' : ''}`}
                                data-title={t('role_register')} onClick={() => navToRoleRegister(user, t)}>
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'role-register'}/>
                                <p>{t('role_register')}</p>
                            </div>
                            <div className={'sidebar-menu-item'} data-title={'Logout'} onClick={logout}>
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'logout'}/>
                                <p>{t('logout')}</p>
                            </div>
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