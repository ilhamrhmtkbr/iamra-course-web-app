import {Outlet, useLocation} from "react-router";
import SvgComp from "../components/SvgComp.jsx";
import {HashLink} from "react-router-hash-link";
import {Suspense, useEffect, useState} from "react";
import {useTranslation} from "react-i18next";
import useAuthStore from "../zustand/store.js";
import {refreshToken} from "../services/service.js";
import Header from "../components/Header.jsx";
import Footer from "../components/Footer.jsx";

export default function Layout() {
    const {t} = useTranslation();

    const [isMinifySidebar, setMinifySidebar] = useState(false);
    const location = useLocation();

    const user = useAuthStore(state => state.user);

    useEffect(() => {
        if (!user) {
            const getUser = async () => {
                await refreshToken();
            }

            getUser()
        }
    }, [])

    return (
        <>
            <Header />
            <main className={`has-sidebar ${isMinifySidebar ? 'active' : ''}`}>
                <Suspense fallback={<div className={'flex-aic-jcc w-full-dvw h-full-dvh'}>
                    <div className={'loading-spinner'}></div>
                </div>}>
                    <section>
                        <Outlet/>
                    </section>
                </Suspense>
                <aside className={'sidebar-menu'}>
                    <div className={'sidebar-menu-content'}>
                        <div className="sidebar-menu-title sidebar-menu-item"
                             onClick={() => setMinifySidebar(prevState => !prevState)}>
                            <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'click'}/>
                            <p>Menu</p>
                        </div>
                        <div className="sidebar-menu-element">
                            <HashLink className={`sidebar-menu-item ${location.pathname === '/courses' ? 'active' : ''}`}
                                      data-title={t('courses')} to="/courses#top">
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'courses'}/>
                                <p>{t('courses')}</p>
                            </HashLink>
                            <HashLink className={`sidebar-menu-item ${location.pathname === '/' ? 'active' : ''}`}
                                      data-title={t('about')} to="/#top">
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'homepage'}/>
                                <p>{t('about')}</p>
                            </HashLink>
                            <HashLink
                                className={`sidebar-menu-item ${location.pathname === '/certificates' ? 'active' : ''}`}
                                data-title={t('certificates')} to="/certificates#top">
                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'certificates'}/>
                                <p>{t('certificates')}</p>
                            </HashLink>
                            {user &&
                                <>
                                    <a className={'sidebar-menu-item'} data-title={t('setting')}
                                       href={import.meta.env.VITE_APP_FRONTEND_USER_URL + '/member/additional-info#top'}>
                                        <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'setting'}/>
                                        <p>{t('setting')}</p>
                                    </a>
                                    {user?.role === 'instructor' ?
                                        <a className={'sidebar-menu-item'} data-title={t('profile')}
                                           href={import.meta.env.VITE_APP_FRONTEND_INSTRUCTOR_URL}>
                                            <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'profile'}/>
                                            <p>{t('profile')}</p>
                                        </a> : user?.role === 'student' ?
                                            <a className={'sidebar-menu-item'} data-title={t('profile')}
                                               href={import.meta.env.VITE_APP_FRONTEND_STUDENT_URL}>
                                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'profile'}/>
                                                <p>{t('profile')}</p>
                                            </a> :
                                            <a className={'sidebar-menu-item'} data-title={t('profile')}
                                               href={import.meta.env.VITE_APP_FRONTEND_USER_URL + '/member/additional-info#top'}>
                                                <SvgComp rule={'sidebar-menu-button-svg'} file={'sprite'} icon={'profile'}/>
                                                <p>{t('profile')}</p>
                                            </a>
                                    }
                                </>
                            }
                        </div>
                    </div>
                </aside>
            </main>
            <Footer />
        </>
    )
}