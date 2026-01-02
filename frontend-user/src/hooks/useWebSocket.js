const useWebSocket = () => {
    let retryCount = 0;
    const maxRetries = 3;
    const reconnectInterval = 3000;
    let reconnectTimeout = null;

    const reconnect = (wsRef, username, setModalSuccessVerifyEmail) => {
        if (!wsRef) {
            console.error('wsRef is undefined or null');
            return;
        }

        // Clear any existing timeout
        if (reconnectTimeout) {
            clearTimeout(reconnectTimeout);
            reconnectTimeout = null;
        }

        // Check if already connected or connecting
        if (wsRef.current && (wsRef.current.readyState === WebSocket.CONNECTING ||
            wsRef.current.readyState === WebSocket.OPEN)) {
            console.log('WebSocket already connecting or connected, skipping...');
            return;
        }

        const wsUrl = import.meta.env.VITE_APP_WEBSOCKET_USER_URL;
        if (!wsUrl) {
            console.error('VITE_APP_WEBSOCKET_USER_URL is not defined');
            return;
        }

        console.log('Attempting to connect to WebSocket:', wsUrl);

        // Close existing connection if any
        if (wsRef.current && wsRef.current.readyState !== WebSocket.CLOSED) {
            wsRef.current.close(1000, 'Creating new connection');
        }

        try {
            const ws = new WebSocket(wsUrl);
            wsRef.current = ws;

            // Add connection timeout
            const connectionTimeout = setTimeout(() => {
                if (ws.readyState === WebSocket.CONNECTING) {
                    console.log('Connection timeout, closing...');
                    ws.close();
                }
            }, 10000); // 10 seconds timeout

            ws.onopen = function () {
                console.log('WebSocket connected successfully');
                retryCount = 0;
                clearTimeout(connectionTimeout);
            }

            ws.onmessage = async function (event) {
                try {
                    console.log('WebSocket message received:', event.data);
                    const message = JSON.parse(event.data);

                    if (message.event === "pusher:connection_established") {
                        const data = JSON.parse(message.data);
                        const socketId = data.socket_id;
                        console.log('Socket ID received:', socketId);

                        const channelName = "private-email-verify-" + username;
                        console.log('Subscribing to channel:', channelName);

                        const authUrl = import.meta.env.VITE_APP_WEBSOCKET_USER_URL_AUTH;
                        if (!authUrl) {
                            console.error('VITE_APP_WEBSOCKET_USER_URL_AUTH is not defined');
                            return;
                        }

                        try {
                            const authRes = await fetch(authUrl, {
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
                                console.error('Auth request failed:', authRes.status, authRes.statusText);
                                return;
                            }

                            const authDataRaw = await authRes.text();
                            console.log('Auth response:', authDataRaw);

                            let authDataJson;
                            try {
                                authDataJson = JSON.parse(authDataRaw);
                            } catch (parseError) {
                                console.error('Failed to parse auth response:', parseError);
                                return;
                            }

                            if (!authDataJson || !authDataJson.auth) {
                                console.error('Invalid auth data received');
                                return;
                            }

                            const subscribeMessage = {
                                event: "pusher:subscribe",
                                data: {
                                    auth: authDataJson.auth,
                                    channel: channelName,
                                },
                            };

                            console.log('Sending subscribe message:', subscribeMessage);

                            // Check if WebSocket is still open before sending
                            if (ws.readyState === WebSocket.OPEN) {
                                ws.send(JSON.stringify(subscribeMessage));
                            } else {
                                console.warn('WebSocket not open, cannot send subscribe message');
                            }
                        } catch (fetchError) {
                            console.error('Error during auth request:', fetchError);
                        }
                    }

                    if (message.event === "verify.email") {
                        console.log('Email verification event received');
                        const payload = JSON.parse(message.data);
                        if (payload.username === username) {
                            console.log('Email verified for user:', username);
                            setModalSuccessVerifyEmail(true);
                        }
                    }

                } catch (e) {
                    console.error("Error parsing WebSocket message:", e);
                }
            };

            ws.onclose = function (event) {
                console.log('WebSocket closed:', event.code, event.reason);
                clearTimeout(connectionTimeout);

                // Don't retry if it was a normal closure or manual close
                if (event.code === 1000 || event.code === 1001) {
                    console.log('WebSocket closed normally, not retrying');
                    return;
                }

                // Only retry for unexpected closures
                if (retryCount < maxRetries && event.code !== 1000) {
                    retryCount++;
                    console.log(`Retrying connection... (${retryCount}/${maxRetries})`);
                    reconnectTimeout = setTimeout(() => {
                        reconnect(wsRef, username, setModalSuccessVerifyEmail);
                    }, reconnectInterval);
                } else {
                    console.log('Max retries reached or normal closure, not retrying');
                }
            };

            ws.onerror = function(error) {
                console.error('WebSocket error occurred:', error);
                clearTimeout(connectionTimeout);
            };

        } catch (error) {
            console.error('Failed to create WebSocket connection:', error);

            // Only retry if we haven't exceeded max retries
            if (retryCount < maxRetries) {
                retryCount++;
                console.log(`Retrying connection after error... (${retryCount}/${maxRetries})`);
                reconnectTimeout = setTimeout(() => {
                    reconnect(wsRef, username, setModalSuccessVerifyEmail);
                }, reconnectInterval);
            } else {
                console.log('Max retries reached after connection error');
            }
        }
    }

    // Cleanup function
    const cleanup = (wsRef) => {
        if (reconnectTimeout) {
            clearTimeout(reconnectTimeout);
            reconnectTimeout = null;
        }
        if (wsRef?.current) {
            wsRef.current.close(1000, 'Cleanup');
        }
        retryCount = 0;
    };

    return { reconnect, cleanup };
}

export default useWebSocket;