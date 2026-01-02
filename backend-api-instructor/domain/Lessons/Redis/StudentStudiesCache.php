<?php

namespace Domain\Lessons\Redis;

use Illuminate\Support\Facades\Cache;

class StudentStudiesCache
{
    private const PREFIX_LESSON = 'lesson';

    public static function deleteLesson(string $sectionId): void
    {
        $keys = Cache::getRedis()->keys(self::PREFIX_LESSON . ":$sectionId");
        if (!empty($keys)) {
            Cache::getRedis()->del($keys);
        }
    }
}
