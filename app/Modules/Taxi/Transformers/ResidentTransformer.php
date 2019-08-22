<?php

namespace Way2Web\Modules\Taxi\Transformers;

use League\Fractal\TransformerAbstract;
use Way2Web\Modules\Taxi\Models\Resident;

class ResidentTransformer extends TransformerAbstract
{

    public function transform(Resident $model)
    {
        return [
            'id'             => (int)$model->id,
            'name'           => $model->full_name,
            'zip_code'       => $model->zip_code,
            'street_number'  => $model->street_number,
            'current_budget' => $model->budget->balance,
        ];
    }
}
