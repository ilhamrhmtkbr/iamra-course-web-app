import {useEffect, useState} from "react";
import {Navigate, Outlet} from "react-router";
import useAuthStore from "../zustand/store.js";
import {refreshToken} from "../services/authService.js";

const RouteGuestMiddleware = () => {
    const user = useAuthStore((state) => state.user);
    const setUser = useAuthStore((state) => state.setUser); // Pastikan ada setter untuk user
    const [checking, setChecking] = useState(true);
    const [redirectPath, setRedirectPath] = useState(null);

    useEffect(() => {
        const checkAuth = async () => {
            if (user) {
                const lastPage = localStorage.getItem("last-page");
                setRedirectPath(lastPage || "/member/additional-info#top");
                setChecking(false);
            } else {
                try {
                    const res = await refreshToken();
                    if (res?.status) {
                        const lastPage = localStorage.getItem("last-page");
                        setRedirectPath(lastPage || "/member/additional-info#top");
                    } else {
                        setChecking(false);
                    }
                } catch (e) {
                    setChecking(false);
                }
            }
        };
        checkAuth();
    }, [user, setUser]);

    if (!checking && redirectPath){
        if (redirectPath.includes("/member/additional-info#top")){
            return <Navigate to={redirectPath} replace/>
        } else {
            window.location.href = redirectPath;
        }
    } else {
        return <Outlet/>;
    }
};

export default RouteGuestMiddleware;
