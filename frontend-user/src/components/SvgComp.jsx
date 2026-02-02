import {memo} from 'react'

const SvgComp = memo((props) => {
    return (
        <svg className={props.rule}>
            <use xlinkHref={import.meta.env.BASE_URL + `/${props.file}.svg#${props.icon}`}></use>
        </svg>
    )
});

export default SvgComp