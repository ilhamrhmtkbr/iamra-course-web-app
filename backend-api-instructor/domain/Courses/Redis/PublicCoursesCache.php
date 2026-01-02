<?php

namespace Domain\Courses\Redis;

use Illuminate\Support\Facades\Cache;

class PublicCoursesCache
{
    private const DEFAULT_TAG = 'public_courses';

    public static function deleteAll(): void
    {
        Cache::tags([self::DEFAULT_TAG])->flush();
    }
}
