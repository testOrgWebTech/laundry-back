<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Owner
        $user = new User();
        $user->role = "owner";
        $user->username = "admin";
        $user->password = "password";
        $user->email = "admin@mail.com";
        $user->first_name = "admin";
        $user->last_name = "admin";
        $user->tel = "0868493211";
        $user->save();

        //Customer
        $user = new User();
        $user->role = "customer";
        $user->username = "customer";
        $user->password = "password";
        $user->email = "customer@mail.com";
        $user->first_name = "customer";
        $user->last_name = "customer";
        $user->tel = "0941324211";
        $user->save();
    }
}
