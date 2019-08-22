<?php

namespace Way2Web\Modules\Taxi\Rules;

use Way2Web\Modules\Taxi\Models\Resident;
use Way2Web\Modules\Taxi\Models\TaxiRide;

class HasEnoughBalanceForTrip
{
    private $resident;
    private $taxiRide;

    public function __construct(Resident $resident, TaxiRide $taxiRide)
    {
        $this->resident = $resident;
        $this->taxiRide = $taxiRide;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @return bool
     */
    public function passes()
    {
        return $this->resident->budget->balance >= $this->taxiRide->distance;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return @trans("validation.insufficient_funds");
    }
}