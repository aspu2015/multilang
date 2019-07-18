<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Country;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
    public function __construct() //// Проверка авторизации ////
    {
        $this->middleware('auth');
    }


    public function index(){
        return View('country.index',[
            'countries' => Country::get()
        ]);
    }

    public function edit($id){
        return View('country.edit',[
            'country' => Country::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $country = Country::find($id);
        $country->name = $request->get('name');
        $country->save();
        return redirect('/country');
    }

    public function create(){
        return View('country.create');
    }

    public function store(Request $request){
        $country = new Country;
        $country->name = $request;
        $country->save();
        return redirect('/country');
    }

    public function destroy(Request $request, $id){
        Country::find($id)->destroy();
        return redirect('/country');
    }
}
