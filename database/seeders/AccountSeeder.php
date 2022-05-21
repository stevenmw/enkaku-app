<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = Account::where('email','superadmin@mail.com')->first();
        if(!$account){
            Account::create([
                'name' => 'superadmin',
                'address' => 'alamat admin',
                'gender' => 'laki-laki',
                'email' => 'superadmin@mail.com',
                'password' => Hash::make('superadmin'),
                'confirm_password' => Hash::make('superadmin'),
            ]);
        }

        $account = Account::where('email','steven@mail.com')->first();
        if(!$account){
            Account::create([
                'name' => 'steven',
                'address' => 'alamat dokter',
                'gender' => 'laki-laki',
                'email' => 'steven@mail.com',
                'password' => Hash::make('12345678'),
                'confirm_password' => Hash::make('12345678'),
            ]);
        }

        $account = Account::where('email','imani@mail.com')->first();
        if(!$account){
            Account::create([
                'name' => 'imani',
                'address' => 'alamat pasien',
                'gender' => 'laki-laki',
                'email' => 'imani@mail.com',
                'password' => Hash::make('12345678'),
                'confirm_password' => Hash::make('12345678'),
            ]);
        }
    }
}
