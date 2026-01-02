export const getHours = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit',
        hour12: false // 24-hour format
    });
};

export const shouldShowDateSeparator = (currentMessage, previousMessage) => {
    if (!previousMessage) return true; // Pesan pertama selalu tampilkan separator

    const currentDate = new Date(currentMessage.created_at);
    const previousDate = new Date(previousMessage.created_at);

    const currentDateStr = currentDate.toDateString();
    const previousDateStr = previousDate.toDateString();

    return currentDateStr !== previousDateStr;
};

export const formatDateSeparator = (dateString, t) => {
    const messageDate = new Date(dateString);
    const now = new Date();

    const messageDateStr = messageDate.toDateString();
    const todayStr = now.toDateString();

    // Hitung yesterday dengan cara yang benar
    const yesterday = new Date();
    yesterday.setDate(yesterday.getDate() - 1);
    const yesterdayStr = yesterday.toDateString();

    if (messageDateStr === todayStr) {
        return t('today');
    } else if (messageDateStr === yesterdayStr) {
        return t('yesterday');
    } else {
        // Format untuk hari lain
        const diffTime = Math.abs(now - messageDate);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        if (diffDays <= 7) {
            return messageDate.toLocaleDateString('en-US', { weekday: 'long' });
        } else {
            return messageDate.toLocaleDateString('en-US', {
                month: 'short',
                day: 'numeric',
                year: messageDate.getFullYear() !== now.getFullYear() ? 'numeric' : undefined
            });
        }
    }
};