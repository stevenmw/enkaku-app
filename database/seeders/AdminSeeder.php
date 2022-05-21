<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = Account::where('email','superadmin@mail.com')->first();
        $admin = Admin::where('account_id',$account->id)->first();
        if(!$admin){
            Admin::create([
                'account_id' => $account->id,
                'start_hour' => Carbon::now()->toTimeString(),
                'end_hour' => Carbon::now()->addHour(3)->toTimeString(),
            ]);
        }
    }
}
