import {useTranslation} from "react-i18next";
import './Homepage.css';
import SvgComp from "../components/SvgComp.jsx";
import {useState, Fragment} from "react";
import {HashLink} from "react-router-hash-link";
import Typewriter from "../components/Typewriter.jsx";
import Header from "../components/Header.jsx";
import Footer from "../components/Footer.jsx";
import useMediaQuery from "../hooks/useMediaQuery.js";

export default function Homepage() {
    const {t} = useTranslation();
    const [isBannerHide, setBannerHide] = useState(false);
    const isMobile = useMediaQuery('(max-width: 800px)')

    const [typeRole, setTypeRole] = useState('student');

    const programming = ['html', 'css', 'javascript', 'laravel', 'mysql', 'postgresql', 'php', 'restapi', 'react', 'github', 'svg']
    const programming2 = ['expressjs', 'mongodb', 'firebase', 'vuejs', 'ajax', 'git', 'cpp', 'python', 'sql-server', 'docker']

    return <>
        <Header/>
        <main>
            <section>
                {!isBannerHide &&
                    <div className={'bg-trans-primary flex-ais-jcc gap-m radius-l p-x'}>
                        <div className={'font-medium font-size-x text-center'}>
                            <p>{t('about_download_the_mobile_version_of_the_android_application')} </p>
                            <a href={'http://ilhamrhmtkbr.github.io/iamra-course-apk/'}
                               className={'text-primary capitalize cursor-pointer text-hover-underline'}>{t('now')}</a>
                        </div>
                        <div className={'badge-button-close'} onClick={() => setBannerHide(true)}>
                            <SvgComp file={'sprite'} icon={'close'}/>
                        </div>
                    </div>}

                <div className={'grid-start'}
                     style={{
                         gridTemplateColumns: isMobile ? "1fr" : "1fr 1fr"
                     }}>
                    <img src={'./bg-about.jpg'}
                         className={'object-fit-cover radius-l'}
                         alt={'ilhamrhmtkbr'}
                         style={{minHeight: 325, maxHeight: 325, width: '100%'}}
                    />
                    <div className={'grid-start'}>
                        <div style={{
                            alignSelf: isMobile ? "start" : "end"
                        }}>
                            <h1 className={'font-medium font-size-x flex-aic-jcs gap-s'}>
                                <span>{t('welcome')}, </span>
                                <Typewriter data={[t('instructor'), t('student'), t('visitor')]}/>
                            </h1>
                            <h3>{t("about_great_subtitle")}</h3>
                            <p>{t("about_great_desc")}</p>
                        </div>
                        <HashLink className={'button btn-primary ps-center mt-m'}
                                  smooth to={'#info'}>
                            <p>{t("about_great_button")}</p>
                            <SvgComp rule={'svg-s fill-blue margin-left-s'} file={'sprite'} icon={'mouse'}/>
                        </HashLink>
                    </div>
                </div>

                <div className='about__anm__section'>
                    <div className="about__anm__container">
                        <div className="about__anm__box">
                            {programming && programming.map((value, i) => (
                                <div className="about__anm__pack" key={i}>
                                    <SvgComp rule='about__anm__pack__svg' path='svg' file='programming' icon={value}/>
                                </div>
                            ))}
                            {programming && programming.map((value, i) => (
                                <div className="about__anm__pack" key={i}>
                                    <SvgComp rule='about__anm__pack__svg' path='svg' file='programming' icon={value}/>
                                </div>
                            ))}
                        </div>
                        <br/>
                        <div className="about__anm__box">
                            {programming2 && programming2.map((value, i) => (
                                <div className="about__anm__pack" key={i}>
                                    <SvgComp rule='about__anm__pack__svg' path='svg' file='programming' icon={value}/>
                                </div>
                            ))}
                            {programming2 && programming2.map((value, i) => (
                                <div className="about__anm__pack" key={i}>
                                    <SvgComp rule='about__anm__pack__svg' path='svg' file='programming' icon={value}/>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>

                <div className={'padding-top-ideal-distance-to-header'} id={'info'}>
                    <h2 className={'section-title'}>Info</h2>
                    <div className={'flex-aic-jcc gap-m text-link'}>
                        <div
                            className={`cursor-pointer text-hover-underline ${typeRole === 'student' ? 'text-primary' : ''}`}
                            onClick={() => setTypeRole('student')}>{t('student')}</div>
                        <div>|</div>
                        <div
                            className={`cursor-pointer text-hover-underline ${typeRole === 'instructor' ? 'text-primary' : ''}`}
                            onClick={() => setTypeRole('instructor')}>{t('instructor')}</div>
                    </div>
                    {typeRole === 'student' ?
                        <div className="max-width-700 ps-center timeline mt-x">
                            {[...Array(5)].map((_, i) => (
                                <Fragment key={i}>
                                    <div className="timeline-item">
                                        <div className="timeline-key active">{i + 1}</div>
                                        <div className="timeline-content">
                                            <h3>{t(`about_info_student_${i + 1}_title`)}</h3>
                                            <p>{t(`about_info_student_${i + 1}_desc`)}</p>
                                        </div>
                                    </div>

                                    <div className="timeline-divider"></div>
                                </Fragment>
                            ))}
                        </div>
                        :
                        <div className="max-width-700 ps-center timeline mt-x">
                            {[...Array(5)].map((_, i) => (
                                <Fragment key={i}>
                                    <div className="timeline-item">
                                        <div className="timeline-key active">{i + 1}</div>
                                        <div className="timeline-content">
                                            <h3>{t(`about_info_instructor_${i + 1}_title`)}</h3>
                                            <p>{t(`about_info_instructor_${i + 1}_desc`)}</p>
                                        </div>
                                    </div>

                                    <div className="timeline-divider"></div>
                                </Fragment>
                            ))}
                        </div>
                    }

                    <HashLink className={'button bg-primary ps-center margin-top-ideal-distance-to-header'}
                              smooth to={'/courses#top'}>
                        {t('explore_now')}
                    </HashLink>
                </div>

                <div className={'padding-top-ideal-distance-to-header'}>
                    <h2 className={'section-title'}>Frequently Asked Questions</h2>
                    <div className={'flex-aic-jcc gap-m text-link'}>
                        <div
                            className={`cursor-pointer text-hover-underline ${typeRole === 'student' ? 'text-primary' : ''}`}
                            onClick={() => setTypeRole('student')}>{t('student')}</div>
                        <div>|</div>
                        <div
                            className={`cursor-pointer text-hover-underline ${typeRole === 'instructor' ? 'text-primary' : ''}`}
                            onClick={() => setTypeRole('instructor')}>{t('instructor')}</div>
                    </div>
                    {typeRole === 'student' ?
                        <div className={'card-wrapper max-width-700 mt-x ps-center'}>
                            {[...Array(7)].map((_, i) => (
                                <Fragment key={i}>
                                    <div className="accordion-item">
                                        <input type="checkbox" id={`accordion-item${i + 1}`}
                                               className="accordion-item-check"/>
                                        <label htmlFor={`accordion-item${i + 1}`} className="accordion-item-label">
                                            <div className={'flex-aic-jcb gap-m'}>
                                                <p>{t(`about_faq_student_${i + 1}_question`)}</p>
                                                <span>▼</span>
                                            </div>
                                            <div
                                                className="accordion-item-label-subtitle">{t(`about_faq_student_${i + 1}_subtitle`)}</div>
                                        </label>
                                        <div className="accordion-content">
                                            <p>{t(`about_faq_student_${i + 1}_content`)}</p>
                                        </div>
                                    </div>
                                </Fragment>
                            ))

                            }
                        </div> :
                        <div className={'card-wrapper max-width-700 mt-x ps-center'}>
                            {[...Array(7)].map((_, i) => (
                                <Fragment key={i}>
                                    <div className="accordion-item">
                                        <input type="checkbox" id={`accordion-${i + 1}`}
                                               className="accordion-item-check"/>
                                        <label htmlFor={`accordion-${i + 1}`} className="accordion-item-label">
                                            <div className={'flex-aic-jcb gap-m'}>
                                                <p>{t(`about_faq_instructor_${i + 1}_question`)}</p>
                                                <span>▼</span>
                                            </div>
                                            <div
                                                className="accordion-item-label-subtitle">{t(`about_faq_instructor_${i + 1}_subtitle`)}</div>
                                        </label>
                                        <div className="accordion-content">
                                            <p>{t(`about_faq_instructor_${i + 1}_content`)}</p>
                                        </div>
                                    </div>
                                </Fragment>
                            ))}
                        </div>
                    }
                </div>
            </section>
        </main>
        <Footer/>
    </>
}