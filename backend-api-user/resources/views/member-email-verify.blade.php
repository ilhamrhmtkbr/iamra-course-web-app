<!DOCTYPE html>
<html lang="en">
<head>
    <title>Email Verification</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 50%, #4a5568 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #e2e8f0;
        }

        .container {
            background: rgba(45, 55, 72, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(113, 128, 150, 0.2);
            border-radius: 20px;
            padding: 3rem 2rem;
            max-width: 500px;
            width: 100%;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(99, 179, 237, 0.5), transparent);
        }

        .icon-container {
            width: 80px;
            height: 80px;
            margin: 0 auto 2rem;
            background: linear-gradient(135deg, #3182ce, #63b3ed);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            animation: pulse 2s infinite;
        }

        .icon-container::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border: 2px solid rgba(99, 179, 237, 0.3);
            border-radius: 50%;
            animation: ripple 2s infinite;
        }

        .icon {
            width: 40px;
            height: 40px;
            fill: white;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #63b3ed, #90cdf4);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
        }

        .subtitle {
            font-size: 1.1rem;
            color: #a0aec0;
            margin-bottom: 2rem;
            font-weight: 400;
        }

        .message {
            background: rgba(26, 32, 44, 0.6);
            border: 1px solid rgba(113, 128, 150, 0.2);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            font-size: 1rem;
            line-height: 1.6;
            color: #cbd5e0;
        }

        .footer {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(113, 128, 150, 0.2);
            font-size: 0.85rem;
            color: #718096;
        }

        .status-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        @keyframes ripple {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(1.2);
                opacity: 0;
            }
        }

        @keyframes blink {
            0%, 50% {
                opacity: 1;
            }
            51%, 100% {
                opacity: 0.3;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 2rem 1.5rem;
                margin: 10px;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="icon-container">
        <svg class="icon" viewBox="0 0 24 24">
            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
        </svg>
    </div>

    <h1>Email Verification</h1>
    <p class="subtitle">We need to verify your email address</p>

    <div class="message">
        <span class="status-indicator status-pending"></span>
        {{ $message ?? 'Please check your email and click the verification link we sent you to complete your account setup.' }}
    </div>

    <div class="footer">
        <p>ilhamrhmtkbr</p>
    </div>
</div>

<script>
    // Simple interaction for demo
    document.querySelector('.btn-primary').addEventListener('click', function(e) {
        e.preventDefault();
        this.innerHTML = '<span>Sending...</span>';
        setTimeout(() => {
            this.innerHTML = `
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    Email Sent!
                `;
        }, 2000);
    });
</script>
</body>
</html>
