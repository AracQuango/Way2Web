<?php

Route::group(["prefix" => "taxi-rides"], function () {
   Route::post("/", \Way2Web\Modules\Taxi\Commands\CreateTaxiRide::class);
   Route::get("/{zip_code?}", \Way2Web\Modules\Taxi\Commands\ListTaxiRides::class);
});