import React, {memo} from 'react'

import SvgComp from './SvgComp.jsx'

const ModalComp = memo(({ title, content, handleClose }) => {
    return (
        <div className='modal'>
            <div className="modal-box">
                <div className="modal-header">
                    <h2>{title}</h2>
                    <div className="badge-button-close" onClick={handleClose}>
                        <SvgComp file='sprite' icon='close' />
                    </div>
                </div>
                <div className="modal-content">
                    {content}
                </div>
                <div className="modal-footer">
                    ilhamrhmtkbr
                </div>
            </div>
        </div>
    )
})

export default ModalComp