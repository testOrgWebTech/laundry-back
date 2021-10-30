<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shipment;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //started data
        $shipment = new Shipment();
        $shipment->send_time = null;
        $shipment->order_id = 1;
        $shipment->save();
    }
}
