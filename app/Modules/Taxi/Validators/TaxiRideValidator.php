<?php

namespace Way2Web\Modules\Taxi\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class TaxiRideValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'pickup_zip'            => 'required|size:6',
            'pickup_street_number'  => 'required',
            'dropoff_zip'           => 'required|size:6',
            'dropoff_street_number' => 'required',
            'resident_id'           => 'required|integer|exists:residents,id'
        ],
    ];
}