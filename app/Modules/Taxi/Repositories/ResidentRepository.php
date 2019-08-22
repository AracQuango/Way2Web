<?php

namespace Way2Web\Modules\Taxi\Repositories;


use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

class ResidentRepository extends BaseRepository
{
    use CacheableRepository;

    protected $fieldSearchable = [
        'first_name' => 'like',
        'last_name'  => 'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return '\\Way2Web\\Modules\\Taxi\\Models\\Resident';
    }

    public function validator()
    {
        return '\\Way2Web\\Modules\\Taxi\\Validators\\ResidentValidator';
    }

    public function presenter()
    {
        return '\\Way2Web\\Modules\\Taxi\\Presenters\\ResidentPresenter';
    }

    public function boot()
    {
        parent::boot();

        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }
}
