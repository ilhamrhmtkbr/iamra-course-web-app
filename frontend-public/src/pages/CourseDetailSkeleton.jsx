import {useTranslation} from "react-i18next";

const CourseDetailSkeleton = () => {
    const {t} = useTranslation()

    return (
        <div className={'max-width-1000 card-wrapper'}
             style={{minWidth: '70dvw'}}>
            <img className={'max-width-500 card-wrapper replace-shadow-with-border loading-pulse'}
                 src={'./courses-ilhamrhmtkbr.webp'}
                 alt={'ilhamrhmtkbr'}/>

            <div>
                <h1 className={'font-medium'}></h1>
                <p></p>
            </div>

            <hr/>
            <div className={'flex-aic-jcs gap-l'}>
                <div className={'max-width-300 card-wrapper replace-shadow-with-border loading-pulse'}>
                    <h3>{t('price')}</h3>
                    <p></p>
                </div>
                <div className={'max-width-300 card-wrapper replace-shadow-with-border loading-pulse'}>
                    <h3>{t('level')}</h3>
                    <p></p>
                </div>
                <div className={'max-width-300 card-wrapper replace-shadow-with-border loading-pulse'}>
                    <h3>{t('status')}</h3>
                    <p></p>
                </div>
            </div>
            <hr/>
            <div className={'data-content'}>
                <div className={'data-key'}>{t('instructor')}</div>
                <div className={'loading-pulse radius-s'}></div>
                <div className={'data-key'}>{t('resume')}</div>
                <div className={'loading-pulse radius-s'}></div>
                <div className={'data-key'}>{t('summary')}</div>
                <div className={'loading-pulse radius-s'}></div>
            </div>
            <br/>
            <hr/>
            <h4>Socials</h4>
            <div className={'loading-pulse radius-s w-full'}
                 style={{height: 31}}></div>
            <hr/>
            <div>
                <h3 className={'capitalize radius-s'}>{t('notes')}</h3>
                <p className={'loading-pulse'}
                   style={{height: 77}}>< /p>
            </div>
            <div>
                <h3 className={'capitalize radius-s'}>{t('requirements')}</h3>
                <p className={'loading-pulse'}
                   style={{height: 77}}></p>
            </div>
        </div>
    )
}

export default CourseDetailSkeleton