<?php

Route::get("/mondays/{startDate}/{endDate}", \Way2Web\Modules\Mondays\Commands\GetMondays::class);