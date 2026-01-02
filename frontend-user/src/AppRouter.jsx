import {Route, BrowserRouter as Router, Routes} from "react-router";
import {lazy, Suspense} from "react";
import RouteGuestMiddleware from "./middleware/RouteGuestMiddleware.jsx";
import RouteMemberMiddleware from "./middleware/RouteMemberMiddleware.jsx";
import ProgressComp from "./components/ProgressComp.jsx";

const Authentication = lazy(() => import("./pages/Authentication.jsx"));
const MemberUpdateAuthentication = lazy(() => import("./pages/MemberUpdateAuthentication.jsx"));
const MemberUpdateAdditionalInfo = lazy(() => import("./pages/MemberUpdateAdditionalInfo.jsx"));
const MemberUpdateEmail = lazy(() => import("./pages/MemberUpdateEmail.jsx"));
const MemberUpdateRoleRegister = lazy(() => import("./pages/MemberUpdateRoleRegister.jsx"));
const NotFound = lazy(() => import("./pages/NotFound.jsx"));

export default function AppRouter() {
    return (
        <Router basename={import.meta.env.VITE_APP_FRONTEND_USER_URL.includes('ngrok') ? '/user' : ''}>
            <Routes>
                <Route element={<RouteGuestMiddleware/>}>
                    <Route path={'/authentication'} element={
                        <Suspense fallback={<ProgressComp/>}>
                            <Authentication/>
                        </Suspense>
                    }/>
                </Route>

                <Route path={'/member'} element={<RouteMemberMiddleware/>}>
                    <Route path={'authentication'} element={
                        <Suspense fallback={<ProgressComp/>}>
                            <MemberUpdateAuthentication/>
                        </Suspense>
                    }/>
                    <Route path={'additional-info'} element={
                        <Suspense fallback={<ProgressComp/>}>
                            <MemberUpdateAdditionalInfo/>
                        </Suspense>}/>
                    <Route path={'email'} element={
                        <Suspense fallback={<ProgressComp/>}>
                            <MemberUpdateEmail/>
                        </Suspense>
                    }/>
                    <Route path={'role-register'} element={
                        <Suspense fallback={<ProgressComp/>}>
                            <MemberUpdateRoleRegister/>
                        </Suspense>
                    }/>
                </Route>

                <Route path="*" element={<NotFound/>}/>
            </Routes>
        </Router>
    )
}