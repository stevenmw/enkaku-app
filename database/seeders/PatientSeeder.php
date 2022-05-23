<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = Account::where('email','imani@mail.com')->first();
        $patient = Patient::where('account_id',$account->id)->first();
        if(!$patient){
            Patient::create([
                'account_id' => $account->id,
                'weight' => 80,
                'height' => 170,
                'disease_and_condition' => 'Sehat Aja',
                'contact_number' => '081928394821'
            ]);
        }
    }
}
