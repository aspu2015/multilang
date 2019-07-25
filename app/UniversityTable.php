<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UniversityTable extends Model
{

    public static function getAllUniversities(){

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
}