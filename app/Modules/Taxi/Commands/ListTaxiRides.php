<?php

namespace Way2Web\Modules\Taxi\Commands;


use Illuminate\Support\Facades\Response;
use Way2Web\Modules\Taxi\Criteria\ByZipCode;
use Way2Web\Modules\Taxi\Repositories\TaxiRideRepository;

class ListTaxiRides
{
    private $taxiRideRepository;

    public function __construct(TaxiRideRepository $taxiRideRepository)
    {
        $this->taxiRideRepository = $taxiRideRepository;
    }

    public function __invoke($zip_code = null)
    {
        if (!is_null($zip_code)) {
            $this->taxiRideRepository->pushCriteria(new ByZipCode($zip_code));
        }

        return Response::json($this->taxiRideRepository->paginate(), 200);
    }
}