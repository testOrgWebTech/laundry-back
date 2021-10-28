<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index() {
        return Shipment::get();
    }

    public function show($id) {
        return Shipment::findOrFail($id);
    }

    public function store(Request $request) {
        $shipment = new Shipment();
        $shipment->send_time = $request->send_time;
        $shipment->save();
        
        return $shipment;
    }

    public function update(Request $request) {
        $shipment = Shipment::findOrFail($request->id);
        $shipment->send_time = $request->send_time;
        $shipment->save();

        return $shipment;
    }

    public function destroy($id) {
        $shipment = Shipment::findOrFail($id);
        $shipment->delete($id);
        //return ;
    }
}
