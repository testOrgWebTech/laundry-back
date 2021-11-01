<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        /*$this->call(AddressSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(PromotionSeeder::class);
        $this->call(ShipmentSeeder::class);*/
    }
}
