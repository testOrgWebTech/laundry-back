<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with('user')->orderBy('updated_at', 'desc')->get();
    }

    public function show($id)
    {
        return Order::findOrFail($id);
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->price = $request->price;
        $order->start_time = $request->start_time;
        $order->finish_time = $request->finish_time;
        $order->expected_send_time = $request->expected_send_time;
        $order->shipment = $request->shipment;
        $order->status = 'waitPayment';
        $order->user_id = $request->user_id;
        $order->save();

        return $order;
    }

    public function update(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->price = $request->price;
        $order->start_time = $request->start_time;
        $order->finish_time = $request->finish_time;
        $order->expected_send_time = $request->expected_send_time;
        $order->status = $request->status;
        $order->shipment = $request->shipment;
        $order->save();

        return $this->index();
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return $this->index();
    }

    public function calExpectedTime($request)
    {
        $orders = Order::get();
        
    }
}
