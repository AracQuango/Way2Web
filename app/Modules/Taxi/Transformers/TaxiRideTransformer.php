<?php

namespace Way2Web\Modules\Taxi\Transformers;

use League\Fractal\TransformerAbstract;
use Way2Web\Modules\Taxi\Models\Resident;
use Way2Web\Modules\Taxi\Models\TaxiRide;

class TaxiRideTransformer extends TransformerAbstract
{

    public function transform(TaxiRide $model)
    {
        return [
            'id'       => (int)$model->id,
            'pickup'   => $model->pickup,
            'dropoff'  => $model->dropoff,
            'distance' => $model->distance,
            'resident' => $model->resident,
        ];
    }
}
