<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Started data
        $order = new Order();
        $order->price = '40';
        $order->start_time = null;
        $order->finish_time = null;
        $order->expected_time = null;
        $order->status = 'waitPayment';
        $order->shipment = 'yes';
        $order->user_id = 1;
        $order->save();
    }
}
