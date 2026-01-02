import {memo} from "react";

const CourseCardComp = memo(({children, title, desc, image}) => {
    return (
        <article className={'border-style-default radius-m max-width-500'}
                 style={{
                     display: 'grid',
                     gridTemplateRows: '212px 1fr'
                 }}>
            <img src={import.meta.env.VITE_APP_IMAGE_COURSE_URL + image}
                 className={'radius-s object-fit-cover w-full'}
                 style={{
                     height: '100%'
                 }}
                 alt={title}/>
            <div className={'box-border p-m'}
                 style={{
                     display: 'grid',
                     gridTemplateRows: '1fr max-content max-content'
                 }}>
                <p className={'font-bold font-size-l'}>{title}</p>
                <p className={'font-light'}>{desc.length > 111 ? desc.slice(0, 111) + '…' : desc}</p>
                {children}
            </div>
        </article>
    )
})

export default CourseCardComp;