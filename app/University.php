<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    //
    public function getGeometryAsArray(){
        return [$this->geolocationX, $this->geolocationY] ;
    }

    public static function getAllUniversities(){
        return University::with('translation')->get();
        // return University::join('translations','translations.university_id','=','universities.id')
        // ->get();
    }

    public function translation(){
        return $this->hasMany('\App\Translation');
    }
}
