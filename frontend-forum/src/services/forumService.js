import {api} from "./api.js";

export const fetchForums = () => api.get('/data');
export const fetchForum = (course_id, before = '') => api.get(`/data/show?course_id=${course_id}&before=${before}`);
export const postForum = data => api.post('/data', data)