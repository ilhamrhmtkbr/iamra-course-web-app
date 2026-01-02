import {GoogleOAuthProvider} from "@react-oauth/google";
import {StrictMode} from 'react'
import {createRoot} from 'react-dom/client'
import AppRouter from './AppRouter.jsx';
import './i18n.js';

createRoot(document.getElementById('top')).render(
    <StrictMode>
        <GoogleOAuthProvider clientId={"501957692849-nprqfdeclrvjseadfs3bpru3arci95eg.apps.googleusercontent.com"}>
            <AppRouter/>
        </GoogleOAuthProvider>
    </StrictMode>
)

document.getElementById("preloader")?.remove();
