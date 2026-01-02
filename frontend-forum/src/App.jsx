import {useEffect, useRef, useState} from "react";
import {useForumsStore, useUserStore} from "./zustand/store.js";
import {me} from "./services/memberService.js";
import {useTranslation} from "react-i18next";
import i18n from "i18next";
import useWebHooks from "./hooks/useWebHooks.js";
import sendMessage from "./hooks/useForum.js";
import Messages from "./component/Messages.jsx";

const App = () => {
    const user = useUserStore(state => state.user);
    const {forums, fetch: fetchGroup, loading: loadingForums} = useForumsStore();
    const {t} = useTranslation();
    const [menuIsActive, setMenuIsActive] = useState(false);
    const [courseId, setCourseId] = useState(null);
    const [courseTitle, setCourseTitle] = useState(null);
    const [lang, setLang] = useState('en');
    const [prepareMessage, setPrepareMessage] = useState('');
    const {setupWebSocket, messages, loading, hasMore, loadOlderMessages} = useWebHooks();
    const messagesEndRef = useRef(null);
    const messagesContainerRef = useRef(null);
    const [isUserScrolling, setIsUserScrolling] = useState(false);
    const [shouldAutoScroll, setShouldAutoScroll] = useState(true);

    // Function to check if user is near bottom
    const isNearBottom = () => {
        if (!messagesContainerRef.current) return true;
        const { scrollTop, scrollHeight, clientHeight } = messagesContainerRef.current;
        return scrollHeight - scrollTop - clientHeight < 100; // 100px threshold
    };

    // Improved scroll to bottom function
    const scrollToBottom = (force = false) => {
        if (force || shouldAutoScroll) {
            messagesEndRef.current?.scrollIntoView({
                behavior: "smooth",
                block: "end"
            });
        }
    };

    // Handle scroll events to detect user scrolling
    const handleScroll = () => {
        if (!messagesContainerRef.current) return;

        const isAtBottom = isNearBottom();
        setShouldAutoScroll(isAtBottom);

        // Reset scrolling state after a delay
        clearTimeout(window.scrollTimeout);
        setIsUserScrolling(true);
        window.scrollTimeout = setTimeout(() => {
            setIsUserScrolling(false);
        }, 1000);
    };

    // Auto scroll when new messages arrive (only if user is near bottom)
    useEffect(() => {
        if (messages && messages.length > 0) {
            // Small delay to ensure DOM is updated
            setTimeout(() => {
                if (shouldAutoScroll && !isUserScrolling) {
                    scrollToBottom();
                }
            }, 50);
        }
    }, [messages, shouldAutoScroll, isUserScrolling]);

    useEffect(() => {
        if (courseId) {
            const cleanup = setupWebSocket(courseId);
            // Reset auto scroll when switching courses
            setShouldAutoScroll(true);
            setIsUserScrolling(false);
            setTimeout(() => scrollToBottom(true), 100);

            return cleanup;
        }
    }, [courseId]);

    useEffect(() => {
        if (user != null) {
            fetchGroup()
        }
    }, [user])

    useEffect(() => {
        if (user == null) {
            (async () => {
                await me();
            })()
        } else {
            window.location.href = import.meta.env.VITE_APP_FRONTEND_USER_URL + '/authentication#top'
        }
    }, [])

    function setLangState(param) {
        setLang(param)
        localStorage.setItem('lang', param);
        i18n.changeLanguage(param);
    }

    function forumChoice(param) {
        setMenuIsActive(false)
        setCourseId(param.id)
        setCourseTitle(param.title)
    }

    const handleSendMessage = () => {
        if (prepareMessage.trim()) {
            (async () => {
                await sendMessage(prepareMessage, courseId, () => {
                    setPrepareMessage('');
                    // Force scroll after sending message
                    setShouldAutoScroll(true);
                    setTimeout(() => scrollToBottom(true), 100);
                });
            })();
        }
    };

    const handleKeyPress = (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            handleSendMessage();
        }
    };

    const handleLoadOlderMessage = () => {
        loadOlderMessages(courseId)
    }

    // Updated scroll to bottom button click
    const handleScrollToBottomClick = () => {
        setShouldAutoScroll(true);
        scrollToBottom(true);
    };

    return (
        <>
            <nav className="chat-nav">
                <a className="chat-nav-link"
                   href={user?.role === 'student' ?
                       import.meta.env.VITE_APP_FRONTEND_STUDENT_URL :
                       import.meta.env.VITE_APP_FRONTEND_INSTRUCTOR_URL
                   }>&#8962;</a>
            </nav>
            <aside className={`chat-menu ${menuIsActive ? 'active' : ''}`}>
                <div className={'chat-menu-header'}>
                    <h1 className="chat-menu-title">Forum</h1>
                    <div className={'chat-menu-pref-lang'}>
                        <p className={`chat-menu-pref-lang-item ${lang === 'en' ? 'active' : ''}`}
                           onClick={() => setLangState('en')}>En</p>
                        <p className={`chat-menu-pref-lang-item ${lang === 'id' ? 'active' : ''}`}
                           onClick={() => setLangState('id')}>Id</p>
                    </div>
                </div>
                {loadingForums ? <p>Loading...</p> :
                    forums?.length > 0 ?
                        <div className="chat-menu-list">
                            {forums?.map((value, index) => (
                                <article className={`chat-menu-list-item ${menuIsActive ? 'active' : ''}`} key={index}
                                         onClick={() => forumChoice(value)}>
                                    <img className="chat-menu-list-item-img"
                                         src={import.meta.env.VITE_APP_IMAGE_COURSE_URL + value.image}
                                         alt={value.title}/>
                                    <div className="chat-menu-list-item-title">
                                        <h3>{value.title}</h3>
                                        <p className="chat-menu-list-item-title-desc">{value.description}</p>
                                    </div>
                                    <div className="chat-menu-list-item-tag">{value.editor}</div>
                                </article>
                            ))}
                        </div> : <div className="chat-menu-list">
                            {user?.role === 'student' ?
                                t('forum_warning_no_courses_student'):
                                t('forum_warning_no_courses_instructor')}
                            <a href={import.meta.env.VITE_APP_FRONTEND_PUBLIC_URL} className={'chat-menu-visit'}>Course</a>
                        </div>}
            </aside>
            <main className="chat-messages">
                <aside className="chat-to-bottom" onClick={handleScrollToBottomClick}>▼</aside>
                <header className="chat-messages-header">
                    {courseTitle ?
                        <h2 className="chat-messages-header-title">{courseTitle}</h2> :
                        <h2 className="chat-messages-header-title">{t("forum_warning_no_choice")}</h2>
                    }
                    <div className="chat-messages-header-helper-menu"
                         onClick={() => setMenuIsActive(prevState => !prevState)}>☰
                    </div>
                </header>
                <section className="chat-messages-content" ref={messagesContainerRef} onScroll={handleScroll}>
                    <Messages loading={loading} messages={messages} hasMore={hasMore}
                              handleLoadOlderMessage={handleLoadOlderMessage} messagesEndRef={messagesEndRef}
                              user={user}/>
                </section>
                <footer className="chat-messages-footer">
                    <input className="chat-messages-input"
                           value={prepareMessage}
                           onChange={e => setPrepareMessage(e.target.value)}
                           onKeyPress={handleKeyPress}
                           placeholder="Type a message..."
                    />
                    <div className="chat-messages-send" onClick={handleSendMessage}>➤</div>
                </footer>
            </main>
        </>
    )
}

export default App;