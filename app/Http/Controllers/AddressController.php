<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index() {
        return Address::get();
    }

    public function show($id) {
        return Address::findOrFail($id);
    }

    public function store(Request $request) {
        $address = new Address();
        $address->province = $request->province;
        $address->district = $request->district;
        $address->postal = $request->postal;
        $address->house_no = $request->house_no;
        $address->house_tel = $request->house_tel;
        $address->save();

        return $address;
    }

    public function update(Request $request) {
        $address = Address::findOrFail($request->id);
        $address->province = $request->province;
        $address->district = $request->district;
        $address->postal = $request->postal;
        $address->house_no = $request->house_no;
        $address->house_tel = $request->house_tel;
        $address->save();

        return $address;
    }

    public function destroy($id) {
        $address = Address::findOrFail($id);
        $address->delete();
        //return ;
    }
}
