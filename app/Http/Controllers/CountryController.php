<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Country;
class CountryController extends Controller
{
    public function index(){
        return View('country.index',[
            'countries' => Country::get()
        ]);
    }
}
