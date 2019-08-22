<?php

Route::group(['prefix' => 'residents'], function() {
    Route::get('/', \Way2Web\Modules\Taxi\Commands\ListResidents::class);
    Route::post('/create', \Way2Web\Modules\Taxi\Commands\CreateResident::class);
});