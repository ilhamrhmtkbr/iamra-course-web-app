import {memo} from "react";

const CertificateCard = memo((props) => {
    return (
        <div className={'ps-center card-wrapper table-box'}
             style={{
                 padding: '50px 0',
                 width: '88dvw'
             }}>
            <div className={'grid-custom border-style-default radius-m'}
                 style={{
                     padding: 20
                 }}>
                <p className={'font-size-x font-bold'}>Certificate of Completion</p>
                <p>This is to certify that</p>
                <p className={'font-size-l font-medium'}>{props.name}</p>
                <p className={'font-size-s font-light'}>has successfully completed the course:</p>
                <p className={'font-size-x'}>{props.courseTitle}</p>
                <p className={'font-size-xs font-light'}>{props.createdAt}</p>
                <div className={'flex-aic-jcb w-full'}>
                    <div className={'font-light font-size-xs'}>
                        <p>iamra</p>
                        <p>ilhamrhmtkbr © 2025</p>
                        <p>Senen, Jakarta Pusat</p>
                        <p>ilhamrhmtkbr@gmail.com</p>
                    </div>
                    <img src={'./iamra-logo.svg'} alt={'ilhamrhmtkbr'}/>
                </div>
            </div>
        </div>
    )
})

export default CertificateCard;