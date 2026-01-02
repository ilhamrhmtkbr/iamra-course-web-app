import {memo, useEffect} from "react";
import SetThemeComp from "./SetThemeComp.jsx";
import GetMenuComp from "./GetMenuComp.jsx";
import useAuthStore from "../zustand/store.js";
import {refreshToken} from "../services/service.js";
import {HashLink} from "react-router-hash-link";
import {useTranslation} from "react-i18next";
import SvgComp from "./SvgComp.jsx";
import {useLocation} from "react-router";

const Header = memo(() => {
    const user = useAuthStore(state => state.user);
    const {t} = useTranslation();

    useEffect(() => {
        if (!user) {
            const getUser = async () => {
                await refreshToken();
            }

            getUser()
        }
    }, [])

    const loc = useLocation()

    return <>
        <header className={'header'}>
            <div className={'header-logo'}>
                <img src={'/iamra-logo.svg'} className={'header-logo-img'} alt={import.meta.env.VITE_APP_NAME}/>
                <span>{import.meta.env.VITE_APP_NAME}</span>
            </div>

            <SetThemeComp/>

            {loc.pathname !== '/' &&
                <GetMenuComp/>}

            <div className={'navigation'}>
                <HashLink className={'hover-progress'} to="/courses#top">
                    {t('courses')}
                </HashLink>
                {user ?
                    <a href={user?.role === 'student' ?
                        import.meta.env.VITE_APP_FRONTEND_STUDENT_URL :
                        user?.role === 'instructor' ?
                            import.meta.env.VITE_APP_FRONTEND_INSTRUCTOR_URL :
                            import.meta.env.VITE_APP_FRONTEND_USER_URL + '/member/additional-info#top'}
                       className={'hover-progress text-truncate'} style={{maxWidth: 111}}>{user.username}</a> :
                    <a href={import.meta.env.VITE_APP_FRONTEND_USER_URL + '/authentication#top'}
                       className={'hover-progress text-truncate'} style={{maxWidth: 111}}>Login</a>
                }
            </div>
        </header>
        <nav>
            <HashLink className={'flex-aic-jcc gap-s'} to="/courses#top">
                <SvgComp rule={'svg-m fill-text fill-blue-hover'} file={'sprite'} icon={'courses'} />
                <span>{t('courses')}</span>
            </HashLink>
            {user ?
                <a href={user?.role === 'student' ?
                    import.meta.env.VITE_APP_FRONTEND_STUDENT_URL :
                    user?.role === 'instructor' ?
                        import.meta.env.VITE_APP_FRONTEND_INSTRUCTOR_URL :
                        import.meta.env.VITE_APP_FRONTEND_USER_URL + '/member/additional-info#top'}
                   className={'flex-aic-jcc gap-s'}>
                    <SvgComp rule={'svg-m fill-text fill-blue-hover'} file={'sprite'} icon={'profile'} />
                    <span>{t(user.role)}</span>
                </a> :
                <a href={import.meta.env.VITE_APP_FRONTEND_USER_URL + '/authentication#top'}
                   className={'flex-aic-jcc gap-s'}>
                    <SvgComp rule={'svg-m fill-text fill-blue-hover'} file={'sprite'} icon={'profile'} />
                    <span>Login</span>
                </a>
            }
            <HashLink className={'flex-aic-jcc gap-s'} to="/#top">
                <SvgComp rule={'svg-m fill-text fill-blue-hover'} file={'sprite'} icon={'homepage'} />
                <span className={'capitalize'}>{t('home')}</span>
            </HashLink>
        </nav>
    </>
})

export default Header