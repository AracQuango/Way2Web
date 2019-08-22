<?php

namespace Way2Web\Modules\Taxi\Repositories;


use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

class TaxiRideRepository extends BaseRepository
{
    use CacheableRepository;

    protected $fieldSearchable = [
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return '\\Way2Web\\Modules\\Taxi\\Models\\TaxiRide';
    }

    public function validator()
    {
        return '\\Way2Web\\Modules\\Taxi\\Validators\\TaxiRideValidator';
    }

    public function presenter()
    {
        return '\\Way2Web\\Modules\\Taxi\\Presenters\\TaxiRidePresenter';
    }

    public function boot()
    {
        parent::boot();

        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }
}
