<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = Account::where('email','steven@mail.com')->first();
        $doctor = Doctor::where('account_id',$account->id)->first();
        if(!$doctor){
            Doctor::create([
                'account_id' => $account->id,
                'specialist' => 'jantung',
                'start_hour' => Carbon::now()->toTimeString(),
                'end_hour' => Carbon::now()->addHour(3)->toTimeString(),
            ]);
        }
    }
}
