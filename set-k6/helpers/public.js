import http from 'k6/http';
import { check } from 'k6';
import execution from 'k6/execution';

// Helper to safely get scenario tag
function getScenarioTag() {
    try {
        return execution.scenario?.tags?.scenario || 'default';
    } catch (e) {
        return 'default';
    }
}

export function getCourses(token) {
    const url = `http://nginx:8080/public-api/v1/courses`;
    
    // ✅ Safely get scenario tag
    const scenarioTag = getScenarioTag();
    
    const params = {
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json',
        },
        tags: { 
            name: 'Get Courses API',
            scenario: scenarioTag
        }
    };
    
    const res = http.get(url, params);
    
    check(res, { 
        'get courses status is 200': (r) => r.status === 200 
    });
    
    return res.json();
}