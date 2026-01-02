import { group, sleep } from 'k6';
import { register, login } from "../helpers/auth.js";

// Utility function
function generateLowercaseString(length = 8) {
    const chars = 'abcdefghijklmnopqrstuvwxyz';
    let result = '';
    for (let i = 0; i < length; i++) {
        result += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return result;
}

// Random user generator untuk register
function getRandomUserData() {
    const timestamp = Date.now();
    const random = generateLowercaseString(5);
    return {
        first_name: 'User',
        middle_name: 'Test',
        last_name: `${timestamp}`,
        username: `user${random}`,
        password: 'Test123!',
        password_confirmation: 'Test123!'
    };
}

// Flow 1: Register new user
export function registerFlow() {
    group('User Registration Flow', function () {
        const userData = getRandomUserData();

        const res = register(
            userData.first_name,
            userData.middle_name,
            userData.last_name,
            userData.username,
            userData.password,
            userData.password_confirmation
        );

        sleep(1);
        return res;
    });
}

// Flow 2: Complete auth flow (register + login)
export function completeAuthFlow() {
    // Step 1: Register
    group('Complete Auth Flow - Register', function () {
        const userData = getRandomUserData();

        const registerRes = register(
            userData.first_name,
            userData.middle_name,
            userData.last_name,
            userData.username,
            userData.password,
            userData.password_confirmation
        );

        if (registerRes.status === 200) {
            sleep(1);

            // Step 2: Login dengan user yang baru dibuat
            group('Complete Auth Flow - Login', function () {
                const loginRes = login(userData.username, userData.password);

                if (loginRes.status === 200) {
                    try {

                    } catch (e) {
                        console.log('Failed to get token after registration');
                    }
                }
            });
        }

        sleep(1);
    });
}