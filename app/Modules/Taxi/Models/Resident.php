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

    public function taxiRides()
    {
        return $this->hasMany(TaxiRide::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getAddressAttribute() {
        return zipToAddress($this->zip_code, $this->street_number);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function (Resident $resident) {
            $resident->budget()->create();
            $resident->budget->transactions()->create([
                "amount"      => 500000,
                "description" => "Base budget for resident. 500KM / 500.000M"
            ]);
        });
    }
}
