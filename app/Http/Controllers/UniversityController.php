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

    public function edit($id){
        $currentUniversity = University::with('translation')->find($id);
        return View('universities.UniversityEdit',[
            'university' => $currentUniversity
        ]);
    }

    public function update(Request $request, $id){
        $university = University::find($id);
        $university->name = $request->get('universityName');
        $university->description = $request->get('universityDescription');
        $university->geolocationX = $request->get('universityLatitude');
        $university->geolocationY = $request->get('universityLongitude');
        $university->save();
        return redirect('/home');
    }

    public function create(){
        return view('universities.UniversityCreate');
    }

    public function store(Request $request){
        // dd( $request->get('name'););
        $university = new \App\University;
        $university->name = $request->get('universityName');
        $university->description = $request->get('universityDescription');
        $university->geolocationX = $request->get('universityLatitude');
        $university->geolocationY = $request->get('universityLongitude');
        $university->save();
        return redirect('/home');
    }

    public function destroy(Request $request, $id){
        University::find($id)->delete();
        return redirect('/home');
    }
}

