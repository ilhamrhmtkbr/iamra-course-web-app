import {memberApi} from "./api.js";
import axios from "axios";

export const studentStore = data => memberApi.post('/member/student', data);
export const instructorStore = data => axios.post(
    import.meta.env.VITE_APP_BACKEND_USER_API_URL + "/member/instructor",
    data,
    {
        headers: {
            "Content-Type": "multipart/form-data",
        },
        withCredentials: true,
    }
);
export const additionalInfoModify = data => memberApi.patch('/member/additional-info', data);
export const authenticationModify = data => memberApi.patch('/member/authentication', data);
export const emailStore = data => memberApi.post('/member/email', data);
