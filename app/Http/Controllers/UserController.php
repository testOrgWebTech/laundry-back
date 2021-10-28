<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return User::get();
    }

    public function show($id) {
        return User::findOrFail($id);
    }

    public function store(Request $request) {
        $user = new User();
        //
        $user->save();
        
        return $user;
    }

    public function update(Request $request) {
        $user = User::findOrFail($request->id);
        //
        $user->save();

        return $user;
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete($id);
        //return ;
    }
}
