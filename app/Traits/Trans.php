<?php
namespace App\Traits;


 trait Trans { 
   
     public function getTransNameAttribute() {
        return  json_decode($this->name, true)[app()->getLocale()];
    }
     // to edit page
     public function getNameEnAttribute() {
        return  json_decode($this->name, true)['en']??'';
    }

     public function getNameArAttribute() {
        return  json_decode($this->name, true)['ar']??'';
    }

    public function getTransDescriptionAttribute() {
        return  json_decode($this->description, true)[app()->getLocale()];
    }

    public function getDescriptionEnAttribute() {
        return  json_decode($this->description, true)['en']??'';
    }

    public function getDescriptionArAttribute() {
        return  json_decode($this->description, true)['ar']??'';
    }

    // using metators

    public function setNameAttribute() {

      $name = [
             'en' => request()->name_en,
             'ar' => request()->name_ar,
      ];

      $this->attributes['name'] = json_encode($name, JSON_UNESCAPED_UNICODE);





    }


 }