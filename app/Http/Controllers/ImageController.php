<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $imageFullName = $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs('images', $imageFullName);

        $image = new Image();
        $image->name = $imageFullName;
        $image->path = Storage::url("images/" . $imageFullName);
        $image->payment_id = $request->id;
        $image->save();

        return $image;
    }
}
