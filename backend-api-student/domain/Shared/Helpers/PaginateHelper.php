<?php

namespace Domain\Shared\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;

class PaginateHelper
{
    public static function getPages(
        array  $data,
        int    $totalCount,
        int    $perPage,
        int    $page,
        string $requestUrl,
        array $requestQuery): LengthAwarePaginator
    {
        return new LengthAwarePaginator(
            collect($data),
            $totalCount,
            $perPage,
            $page,
            ['path' => $requestUrl, 'query' => $requestQuery]
        );
    }
}
