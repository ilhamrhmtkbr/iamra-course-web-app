import {memo} from 'react'

const SvgComp = memo((props) => {
    return (
        <svg className={props.rule}>
            <use xlinkHref={`./${props.file}.svg#${props.icon}`}></use>
        </svg>
    )
})

export default SvgComp