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
            $table->string('expected_send_time')->nullable();
            $table->string('expected_finish_time')->nullable();
            $table->string('price')->nullable();
            $table->enum('status', ['waitPayment', 'paid', 'waitClothes', 'waitQuene', 'inProcess', 'washFinish', 'inShipmentProcess', 'finish']);
            $table->enum('weight', ['13kg', '15kg', '17kg']);
            $table->boolean('shipment');
            $table->foreignIdFor(\App\Models\User::class, 'user_id');
            $table->foreignIdFor(\App\Models\Payment::class, 'payment_id')->nullable();
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
