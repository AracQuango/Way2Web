<?php
namespace Way2Web\Modules\Taxi\Commands;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\MessageBag;
use Prettus\Validator\Exceptions\ValidatorException;
use Way2Web\Modules\Taxi\Models\Resident;
use Way2Web\Modules\Taxi\Models\TaxiRide;
use Way2Web\Modules\Taxi\Repositories\TaxiRideRepository;
use Way2Web\Modules\Taxi\Rules\HasEnoughBalanceForTrip;

class CreateTaxiRide
{
    private $taxiRideRepository;

    public function __construct(TaxiRideRepository $taxiRideRepository)
    {
        $this->taxiRideRepository = $taxiRideRepository;
    }

    public function __invoke(Request $request)
    {
        try {
            $rideId = $this->createTaxiRide($request);
            return Response::json($this->taxiRideRepository->find($rideId), 201);
        } catch (ValidatorException $e) {
            return Response::json($e->getMessageBag(), 422);
        }
    }

    private function createTaxiRide(Request $request) {
        $date = Carbon::now()->format("d-m-Y");
        $resident = Resident::findOrFail($request->resident_id);
        $ride = $resident->taxiRides()->create($request->all());
        $this->validate($ride, $resident);

        $resident->budget->transactions()->create([
            "type" => "subtract",
            "amount" => $ride->distance,
            "description" => "Trip on {$date}"
        ]);

        return $ride["id"];
    }

    private function validate(TaxiRide $ride, Resident $resident) {
        $rule = new HasEnoughBalanceForTrip($resident, $ride);

        if (!$rule->passes())
            throw new ValidatorException(new MessageBag(["balance" => ["The resident does not have enough leftover balance for this trip."]]));
    }
}