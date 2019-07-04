<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
    }

    public function show($id){

    }

    public function create(){
        return view('language.LanguageCreate')
    }

    public function store(Request $request)
    {
        
    }

    public function edit($id)
    {
        
    }
    public function update(Request $request, $id)
    {
        
    }

    public function destroy($request, $id)
    {
        $lang = Language::find($id);
        $lang->delete();
    }

}
