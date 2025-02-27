<?php

namespace Way2Web\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}
