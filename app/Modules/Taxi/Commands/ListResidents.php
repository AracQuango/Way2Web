<?php

namespace Way2Web\Modules\Taxi\Commands;


use Illuminate\Support\Facades\Response;
use Way2Web\Modules\Taxi\Repositories\ResidentRepository;

class ListResidents
{
    private $residentRepository;

    public function __construct(ResidentRepository $residentRepository)
    {
        $this->residentRepository = $residentRepository;
    }

    public function __invoke()
    {
        return Response::json($this->residentRepository->paginate(), 200);
    }
}