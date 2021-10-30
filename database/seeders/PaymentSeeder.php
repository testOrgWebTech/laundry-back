<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Started data
        $payment = new Payment();
        $payment->order_id = 1;
        $payment->e_slip = null;
        $payment->paid_time = null;
        $payment->save();
    }
}
