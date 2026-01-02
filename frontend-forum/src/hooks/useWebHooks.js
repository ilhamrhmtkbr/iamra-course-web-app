import {useRef, useState} from "react";
import {fetchForum} from "../services/forumService.js";

const useWebHooks = () => {
    const wsRef = useRef(null);
    const [messages, setMessages] = useState(null);
    const [loading, setLoading] = useState(false);
    const [hasMore, setHasMore] = useState(true);

    let retryCount = 0;
    const maxRetries = 3;
    const reconnectInterval = 3000;

    const setupWebSocket = (courseId) => {
        setMessages(null);

        // Tutup WebSocket yang lama jika ada
        if (wsRef.current) {
            wsRef.current.close();
            wsRef.current = null;
        }

        function reconnect() {
            // Pastikan WebSocket lama benar-benar ditutup
            if (wsRef.current && wsRef.current.readyState === WebSocket.OPEN) {
                wsRef.current.close();
            }

            const ws = new WebSocket(import.meta.env.VITE_APP_WEBSOCKET_FORUM_URL);
            wsRef.current = ws;

            ws.onopen = function () {
                retryCount = 0;
            }

            ws.onmessage = async function (event) {
                try {
                    const message = JSON.parse(event?.data);

                    if (message.event === "pusher:connection_established") {
                        const data = JSON.parse(message.data);
                        const socketId = data.socket_id;
                        const channelName = "presence-forum-" + courseId;

                        const authRes = await fetch(import.meta.env.VITE_APP_WEBSOCKET_FORUM_URL_AUTH, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded",
                                "Accept": "application/json",
                            },
                            credentials: "include",
                            body: new URLSearchParams({
                                socket_id: socketId,
                                channel_name: channelName,
                            }),
                        });

                        if (!authRes.ok) {
                            return;
                        }

                        const authDataRaw = await authRes.text();

                        let authDataJson;

                        try {
                            authDataJson = JSON.parse(authDataRaw);
                        } catch (parseError) {
                            return;
                        }

                        if (!authDataJson || !authDataJson.auth) {
                            return;
                        }

                        const subscribeMessage = {
                            event: "pusher:subscribe",
                            data: {
                                auth: authDataJson.auth,
                                channel_data: authDataJson.channel_data,
                                channel: channelName,
                            },
                        };

                        ws.send(JSON.stringify(subscribeMessage));
                    }

                    if (message.event === "forum.sent") {
                        let payload = typeof message.data === 'string'
                            ? JSON.parse(message.data)
                            : message.data;

                        setMessages(prev => [payload, ...prev]);
                    }

                } catch (e) {
                    console.error('WebSocket message parsing error:', e);
                }
            };

            ws.onclose = function () {
                if (retryCount < maxRetries) {
                    retryCount++;
                    setTimeout(reconnect, reconnectInterval);
                }
            };
        }

        // Selalu reconnect ketika courseId berubah (tidak peduli status WebSocket)
        if (courseId != null) {
            reconnect();
            (async () => {
                setLoading(true)
                try {
                    let {data} = await fetchForum(courseId);
                    setMessages(Object.values(data?.data) || null);
                } catch (error) {
                    setMessages(null);
                } finally {
                    setLoading(false)
                }
            })()
        }

        return () => {
            if (wsRef.current) {
                wsRef.current.close();
            }
        };
    }

    const loadOlderMessages = (courseId) => {
        setLoading(true);

        const lastMessage = messages[messages.length - 1]; // ambil message teratas saat ini
        const lastTimestamp = lastMessage?.created_at;

        (async () => {
            try {
                let {data} = await fetchForum(courseId, lastTimestamp);
                let newMessages = Object.values(data?.data);
                if (newMessages.length > 0) {
                    setMessages(prev => [...prev, ...newMessages]);
                } else {
                    setHasMore(false)
                }
            } catch (error) {
                setMessages(null);
            } finally {
                setLoading(false)
            }
        })()
    };

    return {setupWebSocket, messages, loadOlderMessages, loading, hasMore}
}

export default useWebHooks