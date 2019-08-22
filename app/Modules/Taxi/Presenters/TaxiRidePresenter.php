<?php

namespace Way2Web\Modules\Taxi\Presenters;


use Prettus\Repository\Presenter\FractalPresenter;
use Way2Web\Modules\Taxi\Transformers\TaxiRideTransformer;

class TaxiRidePresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new TaxiRideTransformer;
    }
}
