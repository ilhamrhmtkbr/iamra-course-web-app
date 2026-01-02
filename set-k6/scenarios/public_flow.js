import { group, sleep } from 'k6';
import { getCourses } from '../helpers/public.js';

// Flow 1: Browse courses (tanpa login - public)
export function browseCoursesFlow() {
    group('Browse Courses (Public)', function () {
        const courses = getCourses(null); 
        
        sleep(0.3); 

        return courses;
    });
}