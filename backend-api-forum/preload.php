<?php

/**
 * OPcache Preload Script for Laravel + RoadRunner
 *
 * This file is loaded ONCE when PHP starts (before any workers run)
 * It preloads frequently used classes into shared memory
 *
 * ⚠️ WARNING: This is NOT a worker script!
 * ⚠️ Do NOT put request handling loops here!
 */

// Prevent direct execution
if (php_sapi_name() !== 'cli') {
    die('Preload script must be run via PHP CLI with opcache.preload');
}

// Start timing (for debugging)
$startTime = microtime(true);
$loadedFiles = 0;

try {
    // Load Composer autoloader
    require_once __DIR__ . '/vendor/autoload.php';

    // Bootstrap Laravel application (this loads core classes)
    $app = require_once __DIR__ . '/bootstrap/app.php';

    // Get the kernel (this triggers service provider loading)
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    // Bootstrap the application (loads config, providers, etc)
    // This is safe because we're not handling requests yet
    $kernel->bootstrap();

    // === OPTIONAL: Preload specific files ===
    // Uncomment if you want to explicitly preload certain files

    /*
    $filesToPreload = [
        // Core Laravel
        __DIR__ . '/vendor/laravel/framework/src/Illuminate/Foundation/Application.php',
        __DIR__ . '/vendor/laravel/framework/src/Illuminate/Container/Container.php',
        __DIR__ . '/vendor/laravel/framework/src/Illuminate/Support/Facades/Facade.php',

        // Your app files
        __DIR__ . '/app/Http/Kernel.php',
        __DIR__ . '/app/Providers/AppServiceProvider.php',
        __DIR__ . '/app/Providers/RouteServiceProvider.php',

        // Add your most-used controllers, models, etc
        // __DIR__ . '/app/Http/Controllers/UserController.php',
        // __DIR__ . '/app/Models/User.php',
    ];

    foreach ($filesToPreload as $file) {
        if (file_exists($file)) {
            opcache_compile_file($file);
            $loadedFiles++;
        }
    }
    */

    // Calculate preload time
    $endTime = microtime(true);
    $duration = round(($endTime - $startTime) * 1000, 2);

    // Log success (goes to stderr in CLI mode)
    error_log(sprintf(
        "✅ OPcache Preload completed in %s ms | Files: %d | Memory: %s MB",
        $duration,
        $loadedFiles,
        round(memory_get_usage(true) / 1024 / 1024, 2)
    ));

} catch (\Throwable $e) {
    // Log preload errors
    error_log(sprintf(
        "❌ OPcache Preload FAILED: %s\nFile: %s:%d",
        $e->getMessage(),
        $e->getFile(),
        $e->getLine()
    ));

    // Don't throw - let PHP continue without preload
    // Throwing here will prevent PHP from starting
}

// Clean up references to prevent memory leaks
unset($app, $kernel, $startTime, $endTime, $duration, $loadedFiles);

// Script ends here - NO LOOPS, NO REQUEST HANDLING!
