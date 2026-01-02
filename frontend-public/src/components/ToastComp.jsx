import {memo} from "react";
import SvgComp from "./SvgComp.jsx";

const ToastComp = memo((props) => {
    return (
        <div className={'toast'}>
            <div className={'bg-' + props.type}>
                <p>{props.msg}</p>
                <div className={'toast-button-close'} onClick={props.handleOnClose}>
                    <SvgComp file={'sprite'} icon={'close'}/>
                </div>
            </div>
        </div>
    )
})

export default ToastComp;