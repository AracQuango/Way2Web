<?php

namespace Way2Web\Modules\Taxi\Criteria;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class ByZipCode implements CriteriaInterface
{
    private $zipCode;

    public function __construct($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where("pickup_zip", 'LIKE', "{$this->zipCode}%");
    }
}