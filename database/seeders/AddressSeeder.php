<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Started data
        $address = new Address();
        $address->province = "Bangkok";
        $address->district = "Jatujak";
        $address->postal = "10900";
        $address->house_no = "2/513";
        $address->house_tel = "028493211";
        $address->user_id = 1;
        $address->save();
    }
}
