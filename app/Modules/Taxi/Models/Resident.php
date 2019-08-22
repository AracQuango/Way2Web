<?php

namespace Way2Web\Modules\Taxi\Models;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'zip_code',
        'street_number',
    ];

    public function budget()
    {
        return $this->hasOne(Budget::class);
    }
}
