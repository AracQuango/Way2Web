<?php

namespace Way2Web\Modules\Taxi\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getBalanceAttribute()
    {
        $transactions = $this->transactions;
        $amount = 0;
        foreach ($transactions as $transaction) {
            $transaction->type == 'add' ? $amount += $transaction->amount : $amount -= $transaction->amount;
        }
        return $amount;
    }
}
