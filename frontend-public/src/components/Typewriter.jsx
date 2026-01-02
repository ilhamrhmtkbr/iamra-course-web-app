import React, {useState, useEffect, memo} from 'react';

const Typewriter = memo(({ data }) => {
    const [text, setText] = useState('');
    const [counter, setCounter] = useState(0);
    const [isDeleting, setDeleting] = useState(false);
    const [delay, setDelay] = useState(100);
    const [delta, setDelta] = useState(delay);

    useEffect(() => {
        function tick() {
            const index = counter % data.length;
            const element = data[index];

            if (isDeleting) {
                setText(prevText => element.substring(0, prevText.length - 1));
            } else {
                setText(prevText => element.substring(0, prevText.length + 1));
            }

            if (isDeleting) {
                setDelta(50);
            }

            if (!isDeleting && text === element) {
                setDelta(1000);
                setDeleting(true);
            } else if (isDeleting && text === '') {
                setDeleting(false);
                setCounter(prevCounter => (prevCounter + 1) % data.length);
                setDelta(delay);
            }
        }

        const timer = setTimeout(() => {
            tick();
        }, delta);

        return () => clearTimeout(timer);
    }, [text, counter, isDeleting, delay, delta, data]);

    return (
        <span
            style={{
                borderRight: "4px solid var(--text-color, #000)",
                animation: "blink 1s infinite",
                paddingRight: "2px"
            }}
        >
            {text}
            <style>{`
                @keyframes blink {
                    0%, 50% { border-color: var(--text-color, #000); }
                    51%, 100% { border-color: transparent; }
                }
            `}</style>
        </span>
    );
});

export default Typewriter;