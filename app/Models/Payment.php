<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function image(){
        return $this->hasOne(Image::class);
    }
}
