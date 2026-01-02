import React, { useEffect, useRef, useState } from "react";

export default function Countdown({ timeInMin = 2 }) {
    const [remainingMs, setRemainingMs] = useState(timeInMin * 60 * 1000);
    const endTimeRef = useRef(Date.now() + timeInMin * 60 * 1000);

    useEffect(() => {
        const id = setInterval(() => {
            const msLeft = Math.max(0, endTimeRef.current - Date.now());
            setRemainingMs(msLeft);
        }, 250);

        return () => clearInterval(id);
    }, []);

    if (remainingMs <= 0) {
        return null; // waktu habis → komponen hilang
    }

    const mm = Math.floor(remainingMs / 60000);
    const ss = Math.floor((remainingMs % 60000) / 1000);

    return (
        <span>
      {String(mm).padStart(2, "0")}:{String(ss).padStart(2, "0")}
    </span>
    );
}