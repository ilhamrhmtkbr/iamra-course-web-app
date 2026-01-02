import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import AppRouter from './AppRouter.jsx';
import './i18n.js';

createRoot(document.getElementById('top')).render(
  <StrictMode>
      <AppRouter/>
  </StrictMode>
)

document.getElementById("preloader")?.remove();