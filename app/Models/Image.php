<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    public function payment(){
        return $this->belongsTo(Payment::class, 'payment_id');
    }
    
    public function getNameAttribute($value)
    {
        return Storage::url("images/" . $value);
    }
}
