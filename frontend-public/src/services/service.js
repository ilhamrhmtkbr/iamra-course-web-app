import api, {memberApi, studentApi} from "./api.js";
import useAuthStore from "../zustand/store.js";

export const me = async () => {
    const {data} = await memberApi.get('/auth/me');
    if (data?.data) {
        useAuthStore.getState().setUser(data?.data)
    }
    return data;
}

export const refreshToken = async () => {
    const response = await memberApi.get('/auth/refresh');
    if (response.status) {
        await me()
    }

    return response;
}

export const publicCoursesFetch = (page, sort, level, status) => api.get(`/courses?page=${page}&sort=${sort}&level=${level}&status=${status}`)
export const publicCoursesSearch = keyword => api.get('/courses?keyword=' + keyword);
export const publicCourseFetch = id => api.get('/course?id=' + id);
export const publicSectionFetch = courseId => api.get('/section?course_id=' + courseId);
export const memberCourseLikeModify = data => memberApi.patch('/member/course-like', data);
export const studentCartStore = data => studentApi.post('/carts', data);