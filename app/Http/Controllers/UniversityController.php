<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UniversityCollection;
use App\University;
use App\Language;
use Illuminate\Support\Facades\Auth;

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
        return view('universities.UniversityInfo');
    }


    /**
    * show possble translations
    * @return string
    */
    public function getLangs(){
        $avalibleLangs = null;
        if(isset($_GET['id']))
            $avalibleLangs = Language::join('translations','translations.language_id','=','languages.id')
                                    ->where('university_id','=',$_GET['id'])
                                    ->get();
        return json_encode($avalibleLangs);
    }


    /**
    * To show all Universities on map
    *
    * @return string
    */
    public function getGeodata(){
        $all = new UniversityCollection();
        $all->fillFeatures(University::all());
        return json_encode($all);
    }

    public function edit(){
        if(!Auth::user() || !isset($_GET['id']))
            return redirect('/');
        $currentUniversity = University::with('translation')->where('id','=',$_GET['id'])->get()[0];
        // dd($currentUniversity);
        return View('universities.UniversityEdit',[
            'university' => $currentUniversity
        ]);
    }

    public function update(){
        
    }
}

