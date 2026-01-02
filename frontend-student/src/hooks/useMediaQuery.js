import { useEffect, useState } from 'react';

/**
 * Custom hook untuk mendeteksi media query
 * @param {string} query - Contoh: '(max-width: 768px)'
 * @returns {boolean}
 */
export default function useMediaQuery(query) {
    const [matches, setMatches] = useState(() =>
        typeof window !== 'undefined' ? window.matchMedia(query).matches : false
    );

    useEffect(() => {
        const mediaQueryList = window.matchMedia(query);
        const listener = (e) => setMatches(e.matches);

        mediaQueryList.addEventListener
            ? mediaQueryList.addEventListener('change', listener)
            : mediaQueryList.addListener(listener); // untuk browser lama

        return () => {
            mediaQueryList.removeEventListener
                ? mediaQueryList.removeEventListener('change', listener)
                : mediaQueryList.removeListener(listener);
        };
    }, [query]);

    return matches;
}
