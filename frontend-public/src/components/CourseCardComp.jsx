import {memo} from "react";
import {formatNumber} from "../utils/Helper.js";

const CourseCardComp = memo(({children, title, image, price, editor, instructor}) => {
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
                <p className={'text-link font-size-s font-medium'}>{instructor}</p>
                <p className={'text-warning font-bold'}>★★★★★</p>
                <p className={'font-bold font-size-s'}>Rp. {formatNumber(price)}</p>
                <p className={'badge badge-small badge-primary capitalize mt-m font-size-xs'}>{editor}</p>
                {children}
            </div>
        </article>
    )
})

export default CourseCardComp;