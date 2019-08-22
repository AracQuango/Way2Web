<?php

namespace Way2Web\Modules\Taxi\Models;

use Illuminate\Database\Eloquent\Model;

class TaxiRide extends Model
{
    protected $fillable = [
        'pickup_zip',
        'pickup_street_number',
        'dropoff_zip',
        'dropoff_street_number',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function getPickupAttribute() {
        return zipToAddress($this->pickup_zip, $this->pickup_street_number);
    }

    public function getDropoffAttribute() {
        return zipToAddress($this->dropoff_zip, $this->dropoff_street_number);
    }

    public function getDistanceAttribute() {
        $pickup = getLatLong($this->pickup->city, $this->pickup->street, $this->pickup->number);
        $dropoff = getLatLong($this->dropoff->city, $this->dropoff->street, $this->dropoff->number);
        $distance = getDistance($pickup, $dropoff);
        return $distance->rows[0]->elements[0]->distance->value;
    }
}
