<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function translate(){
        return $this->hasMany('\App\Language');
    }

    public static function getAvalible(int $id){
        return Language::where('id', '=', $id)->get();
    }
}
