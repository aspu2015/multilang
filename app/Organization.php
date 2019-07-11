<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function translate(){
        return $this->hasMany('\App\Language');
    }

    public static function getAvalible(int $id){
        return Language::where('id', '=', $id)->get();
    }

    public static function getAvalibleLangs($university_id){
        $translationLangs = Language::join('translations', 'languages.id', '=','translations.language_id')
                                      ->where('university_id','=',$university_id)
                                      ->select('languages.id')
                                      ->get('id')
                                      ->pluck('id');
        $availableLang = Language::whereNotIn('id', $translationLangs)->get();
        return $availableLang;
    }
}
