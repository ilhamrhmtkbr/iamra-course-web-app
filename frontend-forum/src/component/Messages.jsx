import {formatDateSeparator, getHours, shouldShowDateSeparator} from "../utils/Helper.js";
import {useTranslation} from "react-i18next";

const Messages = ({ loading, messages,
                      hasMore, handleLoadOlderMessage,
                      messagesEndRef, user }) => {
    const {t} = useTranslation()

    const renderMessage = (value, index) => {
        if (value.username === user?.username) {
            return (
                <div className="chat-messages-content-me" key={index}>
                    <p>{value.message}</p>
                    <p className="chat-messages-content-me-time">
                        {getHours(value.created_at)}
                    </p>
                </div>
            );
        } else {
            return (
                <div className="chat-messages-content-others" key={index}>
                    <div className="chat-messages-content-others-picture">
                        {value.name.split(" ").map(word => word[0]).join("")}
                    </div>

                    <div>
                        <div className="chat-messages-content-others-header">
                            <p className="chat-messages-content-others-header-person">
                                {value.name}
                            </p>
                            <p className="chat-messages-content-others-header-role">
                                {value.role}
                            </p>
                        </div>
                        <div className="chat-messages-content-others-wrapper">
                            <p>{value.message}</p>
                            <p className="chat-messages-content-others-wrapper-time">
                                {getHours(value.created_at)}
                            </p>
                        </div>
                    </div>
                </div>
            );
        }
    };

    const renderGroupedMessages = () => {
        const reversedMessages = messages.slice().reverse();
        const result = [];

        reversedMessages.forEach((message, index) => {
            const previousMessage = index > 0 ? reversedMessages[index - 1] : null;

            if (shouldShowDateSeparator(message, previousMessage)) {
                const dateLabel = formatDateSeparator(message.created_at, t);

                result.push(
                    <div key={`separator-${index}`} className="chat-messages-date-separator">
                        {dateLabel}
                    </div>
                );
            }

            result.push(renderMessage(message, index));
        });

        return result;
    };

    if (loading) {
        return <p>Loading...</p>;
    }

    if (messages && messages.length > 0) {
        return (
            <>
                {hasMore && (
                    <div className={'chat-messages-load-more'}
                         onClick={handleLoadOlderMessage}>
                        Load
                    </div>
                )}
                {renderGroupedMessages()}
                <div ref={messagesEndRef}/>
            </>
        );
    }

    return (
        <div className="chat-messages-content-others">
            <h4>{t('alert')}</h4>
            <p>{t('forum_warning_alert')}</p>
        </div>
    );
}

export default Messages;