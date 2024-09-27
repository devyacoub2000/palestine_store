<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Team extends Model
{
    use HasFactory, Trans;

    protected $guarded = [];

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getImagePathAttribute() {
            
           $url = 'https://via.placeholder.com/100x80';
           if($this->image) {
             $url = asset('images/'.$this->image->path);
           } 
            return $url; 

    }
}
