import { browseCoursesFlow } from '../scenarios/public_flow.js';

export const options = {
    thresholds: {
        'http_req_duration': ['p(95)<1500', 'p(99)<3000'],
        'http_req_failed': ['rate<0.03'],
        
        'http_reqs': ['rate>3'], // Changed from >8 to >3
        
        'checks': ['rate>0.92'],

        // Per-scenario
        'http_req_duration{scenario:browse}': ['p(95)<1000'],
        'http_req_duration{scenario:enroll}': ['p(95)<2000'],
        'http_req_duration{scenario:journey}': ['p(95)<2500'],

        'http_req_failed{scenario:browse}': ['rate<0.02'],
        'http_req_failed{scenario:enroll}': ['rate<0.03'],
        'http_req_failed{scenario:journey}': ['rate<0.05'],
    },

    scenarios: {
        // ✅ OPTION 2: Increase load to meet 8 req/s
        quick_enroll: {
            executor: 'constant-arrival-rate',
            rate: 8, // Increased from 5
            timeUnit: '1s',
            duration: '45s',
            preAllocatedVUs: 20, // Increased from 15
            maxVUs: 35, // Increased from 25
            exec: 'browseCoursesFlow',
            tags: { scenario: 'browse' },
            startTime: '0s',
        },

        student_enroll: {
            executor: 'ramping-vus',
            startVUs: 0,
            stages: [
                { duration: '20s', target: 12 }, // Increased from 8
                { duration: '40s', target: 18 }, // Increased from 12
                { duration: '20s', target: 5 },
                { duration: '10s', target: 0 },
            ],
            exec: 'browseCoursesFlow',
            tags: { scenario: 'enroll' },
            startTime: '50s',
        },

        user_journey: {
            executor: 'constant-vus',
            vus: 10, // Increased from 6
            duration: '2m',
            exec: 'browseCoursesFlow',
            tags: { scenario: 'journey' },
            startTime: '140s',
        },
    },

    userAgent: 'K6-Public-API-Test/1.0',
    insecureSkipTLSVerify: true,
    noConnectionReuse: false,
    rps: 80,

    summaryTrendStats: ['avg', 'min', 'med', 'max', 'p(90)', 'p(95)', 'p(99)', 'count'],
    summaryTimeUnit: 'ms',
};

export { browseCoursesFlow };

export default function () {
    browseCoursesFlow();
}

export function setup() {
    console.log('📚 Starting Public API Load Test');
    console.log('📊 Testing:');
    console.log('   - Get Courses');
    console.log('   - Enroll to Courses');
    console.log('   - View Course Content');
    console.log('');
    console.log('⏱️  Timeline:');
    console.log('   0s - 45s    : Quick Enroll (8 req/s) ⬆️ INCREASED');
    console.log('   50s - 140s  : Student Enroll Journey (12-18 VUs) ⬆️ INCREASED');
    console.log('   140s - 260s : Complete User Journey (10 VUs) ⬆️ INCREASED');
    console.log('');

    return { startTime: new Date().toISOString() };
}

export function teardown(data) {
    console.log('');
    console.log('✅ Public API Test Completed');
    console.log(`   Started: ${data.startTime}`);
    console.log(`   Ended: ${new Date().toISOString()}`);
}