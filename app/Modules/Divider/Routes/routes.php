<?php

Route::group(["prefix" => "/divider"], function() {
   Route::get("/from-range/{start}/{end}/{divider}", \Way2Web\Modules\Divider\Commands\DivideFromRange::class);
});