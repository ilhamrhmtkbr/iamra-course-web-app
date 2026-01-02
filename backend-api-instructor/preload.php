<?php

/**
 * RoadRunner Worker for Laravel
 * Handles PSR-7 requests and converts them to Laravel requests
 */

use Spiral\RoadRunner\Worker;
use Spiral\RoadRunner\Http\PSR7Worker;
use Nyholm\Psr7\Factory\Psr17Factory;

ini_set('display_errors', 'stderr');
require __DIR__ . '/vendor/autoload.php';

// Create RoadRunner PSR-7 worker
$worker = Worker::create();
$factory = new Psr17Factory();
$psr7 = new PSR7Worker($worker, $factory, $factory, $factory);

// Bootstrap Laravel application
$app = require_once __DIR__ . '/bootstrap/app.php';

// Get the HTTP kernel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Pre-warm the application (load config, providers, etc)
$kernel->bootstrap();

echo "✅ Laravel worker started successfully\n";

// Main request loop
$requestCount = 0;
while ($req = $psr7->waitRequest()) {
    try {
        $requestCount++;

        // Convert PSR-7 to Symfony HttpFoundation request
        $symfonyRequest = (new Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory())
            ->createRequest($req);

        // Convert to Laravel request
        $request = Illuminate\Http\Request::createFromBase($symfonyRequest);

        // Handle the request through Laravel
        $response = $kernel->handle($request);

        // Convert Laravel response to PSR-7
        $psr7Response = $factory->createResponse($response->getStatusCode());

        // Copy headers
        foreach ($response->headers->all() as $name => $values) {
            foreach ((array) $values as $value) {
                $psr7Response = $psr7Response->withAddedHeader($name, $value);
            }
        }

        // Write body
        $psr7Response->getBody()->write($response->getContent());

        // Send response back to RoadRunner
        $psr7->respond($psr7Response);

        // Terminate the request (cleanup middleware, events, etc)
        $kernel->terminate($request, $response);

        // Garbage collection every 50 requests to prevent memory leaks
        if ($requestCount % 50 === 0) {
            gc_collect_cycles();
        }

        // Clear resolved instances to prevent memory leaks
        if ($requestCount % 100 === 0) {
            $app->forgetScopedInstances();
        }

    } catch (\Throwable $e) {
        // Log the error
        error_log(sprintf(
            "[%s] Error: %s\nFile: %s:%d\nTrace:\n%s",
            date('Y-m-d H:i:s'),
            $e->getMessage(),
            $e->getFile(),
            $e->getLine(),
            $e->getTraceAsString()
        ));

        // Send error response
        $errorResponse = $factory->createResponse(500)
            ->withHeader('Content-Type', 'application/json');

        $errorData = [
            'error' => 'Internal Server Error',
            'message' => config('app.debug') ? $e->getMessage() : 'Something went wrong',
        ];

        if (config('app.debug')) {
            $errorData['file'] = $e->getFile();
            $errorData['line'] = $e->getLine();
            $errorData['trace'] = explode("\n", $e->getTraceAsString());
        }

        $errorResponse->getBody()->write(json_encode($errorData, JSON_PRETTY_PRINT));

        $psr7->respond($errorResponse);
    }
}
