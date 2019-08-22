<?php

namespace Way2Web\Modules\Taxi\Commands;


use Way2Web\Modules\Taxi\Models\Resident;

class ResetBudgetBalances
{
    public function __invoke()
    {
        foreach (Resident::all() as $resident) {
            $this->clearResidentBalance($resident);
        }
    }

    private function clearResidentBalance(Resident $resident) {
        $currentBalance = $resident->budget->balance;
        $resident->budget->transactions()->create([
            "type" => "subtract",
            "amount" => $currentBalance,
            "description" => "Reset balance to 0 after one year."
        ]);

        $resident->budget->transactions()->create([
            "type" => "add",
            "amount" => 500000,
            "description" => "Add 500 new KM to the residents balance."
        ]);
    }
}