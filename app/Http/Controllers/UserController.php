<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function login(Request $request)
    {
        return User::where([['username', '=', $request->username], ['password', '=', $request->password]])->first();
    }

    public function index()
    {
        return User::get();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function store(Request $request)
    {
        if (User::where('username', '=', $request->username)->first()) {
            return 'usernameExist';
        } else if (User::where('email', '=', $request->email)->first()) {
            return 'emailExist';
        } else {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->tel = $request->tel;
            $user->save();

            $address = new Address();
            $address->province = $request->province;
            $address->district = $request->district;
            $address->postal = $request->postal;
            $address->house_no = $request->house_no;
            $address->house_tel = $request->house_tel;
            $address->user_id = $user->id;
            $address->save();

            return $user;
        }

    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        //
        $user->save();

        return $user;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete($id);
        //return ;
    }
}
