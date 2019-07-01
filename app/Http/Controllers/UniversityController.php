<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UniversityCollection;
use App\University;

class UniversityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('UniversityInfo');
    }

    public function getGeodata(){
        $all = new UniversityCollection();
        $all->fillFeatures(University::all());
        return json_encode($all);
    }
}

