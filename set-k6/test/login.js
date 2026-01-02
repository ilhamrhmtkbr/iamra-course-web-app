import { completeAuthFlow } from "../scenarios/auth_flow.js";

export const options = {
    thresholds: {
        'http_req_duration': ['p(95)<2000', 'p(99)<4000'],
        'http_req_failed': ['rate<0.05'],
        'http_reqs': ['rate>5'],
        'checks': ['rate>0.95'], // Login should be more reliable

        // Per-scenario thresholds
        'http_req_duration{scenario:normal}': ['p(95)<1500'],
        'http_req_duration{scenario:peak}': ['p(95)<2500'],
        'http_req_duration{scenario:stress}': ['p(95)<3000'],

        'http_req_failed{scenario:normal}': ['rate<0.01'],
        'http_req_failed{scenario:peak}': ['rate<0.03'],
        'http_req_failed{scenario:stress}': ['rate<0.05'],
    },

    scenarios: {
        // Normal login traffic
        normal_login: {
            executor: 'constant-vus',
            vus: 5,
            duration: '30s',
            exec: 'completeAuthFlow',
            tags: { scenario: 'normal' },
            startTime: '0s',
        },

        // Peak hour login
        peak_login: {
            executor: 'ramping-vus',
            startVUs: 0,
            stages: [
                { duration: '15s', target: 10 },
                { duration: '30s', target: 20 },
                { duration: '15s', target: 5 },
                { duration: '10s', target: 0 },
            ],
            exec: 'completeAuthFlow',
            tags: { scenario: 'peak' },
            startTime: '35s',
        },
    },

    userAgent: 'K6-Login-Test/1.0',
    insecureSkipTLSVerify: true,
    noConnectionReuse: false,
    rps: 50,

    summaryTrendStats: ['avg', 'min', 'med', 'max', 'p(90)', 'p(95)', 'p(99)', 'count'],
    summaryTimeUnit: 'ms',
};

export { completeAuthFlow };

export default function () {
    completeAuthFlow();
}

export function setup() {
    console.log('🔐 Starting Login Load Test');
    console.log('   Using real user data from instructor.json & student.json');
    console.log('');
    return { startTime: new Date().toISOString() };
}

export function teardown(data) {
    console.log('');
    console.log('✅ Login Test Completed');
    console.log(`   Duration: ${data.startTime} → ${new Date().toISOString()}`);
}