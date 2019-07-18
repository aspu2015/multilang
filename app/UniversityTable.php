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

        return DB::select('select universities.name, universities.description, 
        universities.organization_id, universities.id, organizations.id, 
        organizations.name as orgname, countries.name as countryname from
        universities,organizations,countries where universities.organization_id=organizations.id and 
        universities.country_id=countries.id');
    }

    // public function translation(){
    //     return $this->hasMany('\App\Translation');
    // }
}