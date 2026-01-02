import React, {memo} from 'react'

import SvgComp from '../SvgComp.jsx'

const AlertCloseComp = memo(({ type, msg, close }) => {
    return (
        <div className={'badge badge-close badge-' + type}>
            <p>{msg}</p>
            <div onClick={(close)} className='badge-button-close'>
                <SvgComp file='common' icon='close' />
            </div>
        </div>
    )
})

export default AlertCloseComp