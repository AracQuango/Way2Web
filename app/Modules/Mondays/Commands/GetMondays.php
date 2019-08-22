<?php

namespace Way2Web\Modules\Mondays\Commands;

use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class GetMondays
{

    public function __invoke($startDate, $endDate)
    {
        $startDateInstance = Carbon::createFromFormat("d-m-Y", $startDate);
        $endDateInstance = Carbon::createFromFormat("d-m-Y", $endDate);

        $result = array_map(function ($week) use ($startDateInstance) {
            $monday = $startDateInstance->addWeek()->startOfWeek(Carbon::MONDAY)->format("d-m-Y");
            return "The monday for week {$week} is {$monday}";
        }, range(1, $startDateInstance->diffInWeeks($endDateInstance)));

        return Response::json($result, 200);
    }
}