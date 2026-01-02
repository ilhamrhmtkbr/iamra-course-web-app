import {useNavigate} from "react-router";

export function getPayloadGoogle(cred){
    const base64Payload = cred.split('.')[1];
    return JSON.parse(atob(base64Payload));
}

export const useCustomNavigate = () => {
    const navigate = useNavigate();

    return (pathWithHash, state = {}) => {
        navigate(pathWithHash, {state});

        // Wait for route change then scroll
        setTimeout(() => {
            const hash = pathWithHash.split('#')[1];
            if (hash) {
                const element = document.getElementById(hash);
                if (element) {
                    element.scrollIntoView({behavior: 'smooth'});
                }
            }
        }, 100);
    };
}