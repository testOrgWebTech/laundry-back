<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index() {
        return Promotion::get();
    }

    public function show($id) {
        return Promotion::findOrFail($id);
    }

    public function store(Request $request) {
        $promotion = new Promotion();
        $promotion->promotion_name = $request->promotion_name;
        $promotion->price_discount = $request->price_discount;
        $promotion->percent_discount = $request->percent_discount;
        $promotion->expired = $request->expired;
        $promotion->save();

        return $promotion;
    }

    public function update(Request $request) {
        $promotion = Promotion::findOrFail($request->id);
        $promotion->promotion_name = $request->promotion_name;
        $promotion->price_discount = $request->price_discount;
        $promotion->percent_discount = $request->percent_discount;
        $promotion->expired = $request->expired;
        $promotion->save();
        
        return ;
    }

    public function destroy($id) {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
        //return ;
    }
}
