<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {
        return Payment::get();
    }

    public function show($id) {
        return Payment::findOrFail($id);
    }

    public function store(Request $request) {
        $payment = new Payment();
        $payment->paid_time = $request->paid_time;
        $payment->e_slip = $request->e_slip;
        $payment->order_id = $request->order_id;
        $payment->image_id = $request->image_id;
        $payment->save();
        
        return $payment;
    }

    public function update(Request $request) {
        $payment = Payment::findOrFail($request->id);
        $payment->paid_time = $request->paid_time;
        $payment->e_slip = $request->e_slip;
        $payment->order_id = $request->order_id;
        $payment->image_id = $request->image_id;
        $payment->save();

        return $payment;
    }

    public function destroy($id) {
        $payment = Payment::findOrFail($id);
        $payment->delete($id);
        //return ;
    }

}
