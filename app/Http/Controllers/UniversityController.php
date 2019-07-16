<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UniversityCollection;
use App\University;
use App\Language;
use Illuminate\Support\Facades\Auth;
use App\Organization;
use App\Country;

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
        $selectedCountry = Country::find($currentUniversity->country_id);
        $avalibleCountries = Country::where('id','<>',$currentUniversity->country_id )->get();
        $selectedOrganization = Organization::find($currentUniversity->organization_id);
        $avalibleOrganizations = Organization::where('id','<>',$currentUniversity->organization_id )->get();
        return View('universities.UniversityEdit',[
            'university' => $currentUniversity,
            'organizations' => $avalibleOrganizations,
            'currentOrganisation' => $selectedOrganization,
            'country' => $avalibleCountries,
            'currentCountry' => $selectedCountry
        ]);
    }

    public function update(Request $request, $id){
        $university = University::find($id);
        $university->name = $request->get('universityName');
        $university->organization_id = $request->get('organization_id');
        $university->country_id = $request->get('country_id');
        $university->description = $request->get('universityDescription');
        $university->geolocationX = $request->get('universityLatitude');
        $university->geolocationY = $request->get('universityLongitude');
        $university->save();
        return redirect('/home');
    }

    public function create(){
        $organizations = Organization::all();
        $country = Country::all();
        return view('universities.UniversityCreate',[
            'organizations' => $organizations,
            'country' => $country
        ]);
    }

    public function store(Request $request){
        // dd( $request );
        $university = new \App\University;
        $university->name = $request->get('universityName');
        $university->organization_id = $request->get('organization_id');
        $university->country_id = $request->get('country_id');
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

    public function getData(){
        $organizations = Organization::all();
        $country = Country::all();
        return view('/welcome',[
            'organizations' => $organizations,
            'country' => $country
        ]);
    }
}

