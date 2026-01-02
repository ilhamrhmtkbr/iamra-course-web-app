import {useNavigate} from "react-router";

export function getPage(url) {
    const add = new URL(url);
    return add.searchParams.get('page');
}

export function formatNumber(value) {
    return new Intl.NumberFormat('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }).format(value);
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