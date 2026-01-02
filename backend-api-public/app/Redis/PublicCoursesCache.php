<?php

namespace App\Redis;

use App\Models\InstructorCourse;
use Illuminate\Support\Facades\Cache;

class PublicCoursesCache
{
    private const DEFAULT_TAG = 'public_courses';

    private const TTL = 7212;

    private static function generateCacheKey(string $level, string $status, string $sort, string|int $page): string
    {
        return self::DEFAULT_TAG . ":all:level-{$level}:status-{$status}:sort-{$sort}:page-{$page}";
    }

    public static function all(string $level, string $status, string $sort, string|int $page): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $cacheKey = self::generateCacheKey($level, $status, $sort, $page);

        return Cache::tags([self::DEFAULT_TAG])->remember($cacheKey, self::TTL, function () use ($level, $status, $sort, $page) {
            $query = InstructorCourse::query();

            if ($level !== 'all' && !empty($level)) {
                $query->where('level', $level);
            }

            if ($status !== 'all' && !empty($status)) {
                $query->where('status', $status);
            }

            $query->with(['instructor' => function ($query) {
                $query->select(['user_id'])
                    ->with(['user' => function ($query) {
                        $query->select(['username', 'full_name']);
                    }]);
            }])
                ->select(['id', 'title', 'image', 'price', 'editor', 'instructor_id'])
                ->orderBy('created_at', $sort === 'asc' ? 'asc' : 'desc');

            return $query->paginate(4, ['*'], 'page', $page);
        });
    }
}
