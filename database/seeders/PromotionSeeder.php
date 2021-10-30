<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promotion;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Started data
        $promotion = new Promotion();
        $promotion->order_id = 1;
        $promotion->name = "Last year sale";
        $promotion->percent_discount = 50;
        $promotion->save();
    }
}
