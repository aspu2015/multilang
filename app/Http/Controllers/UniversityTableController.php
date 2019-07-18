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
        return view('universityTable',[
            'universities' => $universities
            
        ]);
    }    
}