<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Translation;
use App\ImageService;

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
        return view('language.LanguageIndex',[
            'langs' => Language::all()
        ]);
    }

    public function show($id){

    }

    public function create(){
        return view('language.LanguageCreate');
    }

    public function store(Request $request)
    {
        $lang = new Language;
        $lang->langName = $request->get('langName');
        $filePath = ImageService::saveImage($request,'file');
        $lang->picturePath =$filePath;
        $lang->save();
        return redirect('/lang');
    }

    public function edit($id)
    {
        $lang = Language::find($id);
        return view('language.LanguageEdit',[
            'lang' => $lang
        ]);
    }

    public function update(Request $request, $id)
    {
        $lang = Language::find($id);
        if($request->hasFile('file')){
            $name = ImageService::saveImage($request, 'file');
            $lang->picturePath = $name;
        }
        $lang->langName = $request->get("langName");
        $lang->save();
        return redirect('/lang');
    }

    public function destroy(Request $request, $id)
    {
        $lang = Language::find($id);
        Translation::where('language_id','=',$lang->id)->delete();
        $lang->delete();
        return redirect('/lang');
    }

}
