<?php

namespace Way2Web\Modules\Taxi\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'type',
        'amount',
        'description'
    ];

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }
}
