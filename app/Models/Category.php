<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Category extends Model
{
    use HasFactory, Trans;

    protected $guarded = [];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
     // img_path => ImagPath

    // Accessor Function
    public function getImgPathAttribute () {
           $url = 'https://via.placeholder.com/100x80';
           if($this->image) {
             $url = asset('images/'.$this->image->path);
           } 
            return $url; 
    }

   


}
