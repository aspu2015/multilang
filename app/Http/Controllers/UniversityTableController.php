<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UniversityCollection;
use App\UniversityTable;

class UniversityTableController extends Controller
{

    
    
    public function index()
    {
        $universities = UniversityTable::getAllUniversities();
        $organizations = UniversityTable::getAllOrganizations();
        $countries = UniversityTable::getAllCountries();
        return view('universityTable',[
            'universities' => $universities
                     
        ]);
    }

    public function getData() {
        $all = UniversityTable::getAllUniversities();
        return json_encode($all);
    }
}