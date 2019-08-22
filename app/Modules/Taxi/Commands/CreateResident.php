<?php

namespace Way2Web\Modules\Taxi\Commands;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;
use Way2Web\Modules\Taxi\Models\Resident;
use Way2Web\Modules\Taxi\Repositories\ResidentRepository;

class CreateResident
{
    use AuthorizesRequests;

    private $residentRepository;

    public function __construct(ResidentRepository $residentRepository)
    {
        $this->residentRepository = $residentRepository;
    }

    public function __invoke(Request $request)
    {
        // TODO:
        // Because authorization doesn't have to be made in this assignment,
        // there's no way of authorizing a user to create a resident.
        // But just for the sake of completion, I'd recommend using Laravel's
        // default Gate. Perhaps in combination with a package like
        // Joseph Sibler's Bouncer, or Spatie's excellent Laravel Permissions package.
        //
        // In case this functionality will ever be implemented:
        // $this->authorize('create', Resident::class);

        try {
            $resident = $this->residentRepository->create($request->all());

            return Response::json($resident, 201);
        } catch (ValidatorException $e) {
            return Response::json($e->getMessageBag(), 422);
        }
    }
}