<?php

namespace Way2Web\Modules\Taxi\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class ResidentValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'zip_code'      => 'required|size:6',
            'street_number' => 'required',
        ],
    ];
}