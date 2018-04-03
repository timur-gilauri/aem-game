<?php

namespace App\Classes;


use Illuminate\Pagination\LengthAwarePaginator;

class Paginator extends LengthAwarePaginator
{
    public function __construct(
        $items,
        int $total,
        int $perPage,
        $path = null,
        ?int $currentPage = null,
        array $options = []
    )
    {
        parent::__construct($items, $total, $perPage, $currentPage, $options);

        if ($path) {
            $this->path = $path;
        }


        static::$defaultView = 'pagination::bootstrap-4';
    }

}