import { registerFlow } from "../scenarios/auth_flow.js";

export const options = {
    // ===== THRESHOLDS =====
    thresholds: {
        // Global thresholds
        'http_req_duration': ['p(95)<3000', 'p(99)<5000'],
        'http_req_failed': ['rate<0.05'], // Max 5% failed requests
        'http_reqs': ['rate>3'], // Min 3 requests per second
        'checks': ['rate>0.90'], // 90% checks harus pass

        // Per-scenario thresholds
        'http_req_duration{scenario:normal}': ['p(95)<2000'],
        'http_req_duration{scenario:peak}': ['p(95)<3000'],
        'http_req_duration{scenario:stress}': ['p(95)<4000'],
        'http_req_duration{scenario:spike}': ['p(95)<5000'],
        'http_req_duration{scenario:endurance}': ['p(95)<2500'],

        // Error rate per scenario
        'http_req_failed{scenario:normal}': ['rate<0.01'], // 1%
        'http_req_failed{scenario:peak}': ['rate<0.03'], // 3%
        'http_req_failed{scenario:stress}': ['rate<0.05'], // 5%
        'http_req_failed{scenario:spike}': ['rate<0.10'], // 10%
        'http_req_failed{scenario:endurance}': ['rate<0.02'], // 2%
    },

    // ===== SCENARIOS =====
    scenarios: {
        // 1. Normal Traffic - Baseline
        normal_user_traffic: {
            executor: 'constant-vus',
            vus: 3, // Reduced from 5
            duration: '30s', // Extended from 10s
            exec: 'registerFlow',
            tags: { scenario: 'normal' },
            startTime: '0s',
            gracefulStop: '5s',
        },

        // 2. Peak Traffic - Gradual increase
        peak_traffic: {
            executor: 'ramping-vus',
            startVUs: 0,
            stages: [
                { duration: '10s', target: 5 },   // Warm up
                { duration: '10s', target: 10 },  // Build up
                { duration: '20s', target: 15 },  // Peak hold
                { duration: '10s', target: 5 },   // Cool down
                { duration: '10s', target: 0 },   // End
            ],
            exec: 'registerFlow',
            tags: { scenario: 'peak' },
            startTime: '35s', // After normal ends
            gracefulStop: '10s',
        },

        // 3. Stress Test - Controlled load increase
        stress_test: {
            executor: 'ramping-arrival-rate',
            startRate: 1,
            timeUnit: '1s',
            preAllocatedVUs: 20,
            maxVUs: 30,
            stages: [
                { duration: '20s', target: 3 },   // Warm up
                { duration: '20s', target: 6 },   // Increase
                { duration: '20s', target: 10 },  // Stress
                { duration: '20s', target: 15 },  // Peak stress
                { duration: '20s', target: 5 },   // Cool down
            ],
            exec: 'registerFlow',
            tags: { scenario: 'stress' },
            startTime: '95s', // After peak ends
            gracefulStop: '15s',
        },

        // 4. Spike Test - Sudden load
        spike_test: {
            executor: 'ramping-vus',
            startVUs: 2,
            stages: [
                { duration: '10s', target: 2 },   // Normal
                { duration: '5s', target: 20 },   // Sudden spike!
                { duration: '15s', target: 20 },  // Hold spike
                { duration: '10s', target: 2 },   // Back to normal
            ],
            exec: 'registerFlow',
            tags: { scenario: 'spike' },
            startTime: '195s', // After stress ends
            gracefulStop: '10s',
        },

        // 5. Endurance Test - Stability over time
        endurance_test: {
            executor: 'constant-vus',
            vus: 5,
            duration: '2m', // 2 minutes sustained load
            exec: 'registerFlow',
            tags: { scenario: 'endurance' },
            startTime: '240s', // After spike ends
            gracefulStop: '10s',
        },
    },

    // ===== GLOBAL SETTINGS =====
    userAgent: 'K6-LoadTest/1.0',
    insecureSkipTLSVerify: true, // Set true for self-signed certs
    noConnectionReuse: false, // Reuse connections (more realistic)

    // Rate limiting
    rps: 100, // Max 100 requests per second globally

    // Timeouts
    setupTimeout: '60s',
    teardownTimeout: '30s',

    // ===== REPORTING =====
    summaryTrendStats: ['avg', 'min', 'med', 'max', 'p(90)', 'p(95)', 'p(99)', 'count'],
    summaryTimeUnit: 'ms',

    // Disable default console output untuk report yang lebih clean
    noVUConnectionReuse: false,
};

// Export the test function
export { registerFlow };

// Default function (fallback)
export default function () {
    console.log('⚠️  Running default function - use scenarios for better control');
    registerFlow();
}

// Setup - runs once before test starts
export function setup() {
    console.log('🚀 Starting Register Load Test');
    console.log('📊 Test Timeline:');
    console.log('   0s - 30s    : Normal Traffic (3 VUs)');
    console.log('   35s - 95s   : Peak Traffic (0→15 VUs)');
    console.log('   95s - 195s  : Stress Test (1→15 req/s)');
    console.log('   195s - 240s : Spike Test (2→20 VUs spike)');
    console.log('   240s - 360s : Endurance Test (5 VUs for 2min)');
    console.log('');
    console.log('⏱️  Total duration: ~6 minutes');
    console.log('🎯 Testing: User Registration API');
    console.log('');

    return {
        startTime: new Date().toISOString(),
        testName: 'User Registration Load Test'
    };
}

// Teardown - runs once after test completes
export function teardown(data) {
    console.log('');
    console.log('✅ Load Test Completed!');
    console.log(`   Started: ${data.startTime}`);
    console.log(`   Ended: ${new Date().toISOString()}`);
    console.log('');
    console.log('📈 Next Steps:');
    console.log('   1. Check results/ folder for detailed reports');
    console.log('   2. View Grafana dashboard for metrics');
    console.log('   3. Analyze failed requests if any');
    console.log('');
}