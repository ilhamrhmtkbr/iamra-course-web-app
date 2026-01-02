import Layout from "../pages/Layout.jsx";
import {Navigate} from "react-router";
import useAuthStore from "../zustand/store.js";

const RouteMemberMiddleware = () => {
    let user = useAuthStore.getState().user;

    if (user) {
        return <Layout />
    } else {
        return <Navigate to={'/authentication#top'} replace/>
    }
};

export default RouteMemberMiddleware;
