<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UniversityTable extends Model
{
    //
    // public function getGeometryAsArray(){
    //     return [$this->geolocationX, $this->geolocationY] ;
    // }

    public static function getAllUniversities(){
        //return University::with('translation')->get();

        // return DB::table('universities')
        // ->join('organizations','universities.organization_id','=','organizations.id')
        // ->get();

        return DB::select('select translations.*, languages.langName, 
        languages.picturePath 
        from translations, languages 
        where translations.language_id = languages.id 
        and university_id <> 99999');
    }

    public static function getAllOrganizations() {
        return DB::table('organizations')
        ->get();
    }

    public static function getAllCountries() {
        return DB::table('countries')
        ->get();;
    }

    // public function translation(){
    //     return $this->hasMany('\App\Translation');
    // }
}