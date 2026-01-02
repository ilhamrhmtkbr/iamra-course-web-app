import {memo, useEffect, useState} from 'react'

const SetThemeComp = memo(() => {
    const [isDarkMode, setIsDarkMode] = useState(false)

    const toggleTheme = (e) => {
        e.preventDefault()
        e.stopPropagation()
        const newTheme = !isDarkMode
        setIsDarkMode(newTheme)
        const body = document.body
        if (newTheme) {
            body.classList.add('dark-mode')
            localStorage.setItem('theme-' + import.meta.env.VITE_APP_NAME, 'dark')
        } else {
            body.classList.remove('dark-mode')
            localStorage.setItem('theme-' + import.meta.env.VITE_APP_NAME, 'light')
        }
    }

    useEffect(() => {
        const appName = import.meta.env.VITE_APP_NAME
        const theme = localStorage.getItem('theme-' + appName)
        if (theme) {
            const isDark = theme === 'dark'
            setIsDarkMode(isDark)
            const body = document.body
            if (isDark) {
                body.classList.add('dark-mode')
            } else {
                body.classList.remove('dark-mode')
            }
        } else {
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches
            setIsDarkMode(prefersDark)
            const body = document.body
            if (prefersDark) {
                body.classList.add('dark-mode')
            } else {
                body.classList.remove('dark-mode')
            }
        }
    }, [])

    return (
        <div className="flex-aic-jcs gap-m">
            <div className="toggle cursor-pointer" onClick={toggleTheme}>
                <input
                    type="checkbox"
                    className="toggle-check"
                    checked={isDarkMode}
                    readOnly
                />
                <span className="toggle-slider">{isDarkMode ? '☾' : '☀'}</span>
            </div>
        </div>
    )
})

export default SetThemeComp