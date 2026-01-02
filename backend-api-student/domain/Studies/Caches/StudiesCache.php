<?php

namespace Domain\Studies\Caches;

use Domain\Shared\Models\InstructorLesson;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class StudiesCache
{
    private const DEFAULT_TTL = 7212;
    private const PREFIX_LESSON = 'lesson';

    public static function getLesson(string $sectionId, ?int $page = 1)
    {
        $key = $sectionId;

        $query = InstructorLesson::where('instructor_section_id', $sectionId)
            ->select(['id', 'instructor_section_id', 'title', 'description', 'code', 'order_in_section'])
            ->orderBy('order_in_section', 'asc');

        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        $key .= '_page' . $page;

        return Cache::remember(self::PREFIX_LESSON . ':' . $key, self::DEFAULT_TTL, function () use ($query) {
            return $query->paginate(7);
        });
    }
}
