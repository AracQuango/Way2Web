<?php

namespace Way2Web\Modules\Divider\Commands;


use Illuminate\Support\Facades\Response;

class DivideFromRange
{

    public function __invoke($start, $end, $divider)
    {
        $collection = range($start, $end);
        $divider = abs(count($collection) / $divider);
        return Response::json(array_chunk($collection, $divider), 200);
    }
}