<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Service extends Model
{
    use HasFactory, Trans;

    protected $guarded = [];

     
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    } 
    public function getImagePathAttribute() {
        $url = asset('images/noo_imagee.jpg');
        if($this->image) {
            $url = asset('images/'.$this->image->path);
        }
        return $url;
    }
}
