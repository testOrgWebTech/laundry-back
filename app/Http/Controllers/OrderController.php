<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shipment;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with('user', 'payment.image')->orderBy('updated_at', 'desc')->get();
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
        $order->expected_finish_time = $request->expected_finish_time;
        $order->shipment = $request->shipment;
        $order->status = 'waitPayment';
        $order->user_id = $request->user_id;
        $order->weight = $request->weight;
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
        $order->expected_finish_time = $request->expected_finish_time;
        $order->status = $request->status;
        $order->shipment = $request->shipment;
        $order->weight = $request->weight;
        $order->save();

        if ($request->shipment && $order->status == 'inShipmentProcess') {
            $shipment = new Shipment();
            //$shipment->send_time = $request->shipment;
            $shipment->status = 'inProcess';
            $shipment->save();
        }

        return $this->index();
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return $this->index();
    }

    public function calOverall(Request $request)
    {
        if ($request->weight == '13kg') {
            $request['price'] = 40;
        } else if ($request->weight == '15kg') {
            $request['price'] = 50;
        } else if ($request->weight == '17kg') {
            $request['price'] = 60;
        }
        if ($request->shipment) {
            $request['price'] += 20;
        }
        $expected_send = new Carbon($request->expected_send_time);
        /*$orders = Order::where('status', '=', 'inProcess')->orWhere('status', '=', 'inQuene')->orderBy('updated_at', 'desc')->get();
        $time = 0;
        if (count($orders) > 1) {
            $start = $orders->first()->updated_at;
            $finish = $orders->last()->updated_at;
            $time = $finish->diffInSeconds($start);
        } 
        $request['expected_finish_time'] =  $expected_send->addSeconds($time);*/
        $request['expected_finish_time'] =  $expected_send->addHour(6);
        return $request;
    }
}
