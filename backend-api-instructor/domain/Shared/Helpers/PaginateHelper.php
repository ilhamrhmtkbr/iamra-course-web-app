<?php

namespace Domain\Shared\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class PaginateHelper
{
    public static function getPages(
        array  $results,
        int    $perPage,
        int    $page,
        string $requestUrl,
        array  $requestQuery): LengthAwarePaginator
    {
        $totalCount = !empty($results) ? $results[0]->total_count : 0;

        $data = [];

        if (!empty($results)) {
            foreach ($results as $row) {
                $rowArray = (array)$row;

                if ($rowArray['total_count']) {
                    unset($rowArray['total_count']);
                }

                array_push($data, $rowArray);
            }
        }

        return new LengthAwarePaginator(
            collect($data),
            $totalCount,
            $perPage,
            $page,
            ['path' => $requestUrl, 'query' => $requestQuery]
        );
    }
}
