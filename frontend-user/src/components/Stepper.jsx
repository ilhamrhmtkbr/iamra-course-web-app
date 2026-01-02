import {HashLink} from "react-router-hash-link";
import useMember from "../hooks/useMember.js";
import {useLocation} from "react-router";

const Stepper = ({user, t}) => {
    const {navToRoleRegister} = useMember()
    const location = useLocation()

    return (
        <div className="stepper">
            <div className="stepper-item">
                <HashLink to={'/member/additional-info#top'} smooth
                          className={`stepper-key ${location.pathname.includes('additional-info') ? 'active' : ''}`}>1</HashLink>
                <div className="stepper-value">{t('additional_info')}</div>
            </div>
            <div className="stepper-divider"></div>
            <div className="stepper-item">
                <HashLink to={'/member/authentication#top'} smooth
                          className={`stepper-key ${location.pathname.includes('authentication') ? 'active' : ''}`}>2</HashLink>
                <div className="stepper-value">{t('authentication')}</div>
            </div>
            <div className="stepper-divider"></div>
            <div className="stepper-item">
                <HashLink to={'/member/email#top'} smooth
                          className={`stepper-key ${location.pathname.includes('email') ? 'active' : ''}`}>3</HashLink>
                <div className="stepper-value">{t('email')}</div>
            </div>
            <div className="stepper-divider"></div>
            <div className="stepper-item">
                <HashLink to={'/member/role-register#top'}
                          smooth
                          className={`stepper-key ${location.pathname.includes('role-register') ? 'active' : ''}`}
                          onClick={() => navToRoleRegister(user, t)}
                >4</HashLink>
                <div className="stepper-value">{t('role_register')}</div>
            </div>
        </div>
    )
}

export default Stepper