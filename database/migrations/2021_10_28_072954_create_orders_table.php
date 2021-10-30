<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('finish_time')->nullable();
            $table->string('expected_time')->nullable();
            $table->string('price');
            $table->enum('status', ['waitPayment', 'paid', 'waitClothes', 'waitQuene', 'inProcess', 'finish']);
            $table->enum('shipment', ['yes', 'no']);
            $table->foreignIdFor(\App\Models\User::class,'user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
