import {postForum} from "../services/forumService.js";

const sendMessage = async (message, course_id, callback) => {
    if (message.trim() === '') {
        alert('Message cannot be empty!');
        return;
    }

    if (!course_id) {
        alert('Please select a course first!');
        return;
    }

    try {
        let as = await postForum({ message, course_id });
        callback()
    } catch (error) {
        alert('Failed to send message');
    }
}

export default sendMessage;