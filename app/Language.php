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

    public static function langToEdit($translationId){
        $collection =Language::join('translations','translations.language_id','=', 'languages.id')->where('translations.id','=',$translationId)->get();
        return $collection;
    }
}
