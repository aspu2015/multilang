<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UniversityCollection;
use App\University;
use App\Language;

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
        
        $avalibleLangs = Language::join('translations','translations.language_id','=','languages.id')
                                    ->where('university_id','=',$_GET['id'])
                                    ->get();
        return view('UniversityInfo',[
            'avalibleLangs' => $avalibleLangs
        ]);
    }

    public function getGeodata(){
        $all = new UniversityCollection();
        $all->fillFeatures(University::all());
        return json_encode($all);
    }
}

