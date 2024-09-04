<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Product extends Model
{
    use HasFactory, Trans;

    protected $guarded = [];

    public function category() {
        return $this->belongsTo(category::class)->withDefault();
    }

     public function image() {
        return $this->morphOne(Image::class, 'imageable')->where('type', 'main');
    }

    public function galary() {
    return $this->morphMany(Image::class, 'imageable')->where('type', 'galary');
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function order_details() {
        return $this->hasMany(OrderDetail::class);
    }



    
}
