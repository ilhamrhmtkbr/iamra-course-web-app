import {GoogleOAuthProvider} from "@react-oauth/google";
import {StrictMode} from 'react'
import {createRoot} from 'react-dom/client'
import AppRouter from './AppRouter.jsx';
import './i18n.js';

createRoot(document.getElementById('top')).render(
    <StrictMode>
        <GoogleOAuthProvider clientId={import.meta.env.VITE_GOOGLE_CLIENT_ID}>
            <AppRouter/>
        </GoogleOAuthProvider>
    </StrictMode>
)

document.getElementById("preloader")?.remove();
