import { memo } from "react";

const ErrorInputMessageComp = memo(({ errorsYup, errorsFromBackend, field }) => {
    let error;

    if (errorsYup && errorsYup[field]) {
        error = errorsYup[field]?.message;
    } else if (errorsFromBackend?.errors && (field in errorsFromBackend?.errors)) {
        error = errorsFromBackend?.errors?.[field]?.[0];
    }

    return error ? <p className="text-error-msg">{error}</p> : null;
});

export default ErrorInputMessageComp;
