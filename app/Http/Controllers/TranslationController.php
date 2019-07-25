<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Translation;

class TranslationController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $availableLang = Language::getAvalibleLangs($id);
        return view('translations.TranslationCreate',[
            'langs' => $availableLang,
            'university_id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $translation = new \App\Translation;
        $translation->university_id = $id;
        $translation->language_id = $request->get('language_id');
        $translation->name = $request->get('universityName');
        $translation->shortDescription = $request->get('universityShortDescription');
        $translation->text = $request->get('universityDescription');
        $translation->country = $request->get('universityCountry');
        $translation->organization = $request->get('universityOrganization');
        $translation->save();
        return redirect("/university/$id/edit");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $translation = Translation::find($id);
        $avalibleLangs = Language::getAvalibleLangs($translation->university_id);
        $selectedLanguage = Language::find($translation->language_id);
        return view('translations.TranslationEdit',[
            'translation'=>$translation,
            'avalibleLangs'=>$avalibleLangs,
            'selectedLang' => $selectedLanguage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $translation = Translation::find($id);
        $translation->language_id = $request->get('language_id');
        $translation->name = $request->get('universityName');
        $translation->shortDescription = $request->get('universityShortDescription');
        $translation->text = $request->get('universityDescription');
        $translation->country = $request->get('universityCountry');
        $translation->organization = $request->get('universityOrganization');
        $translation->save();
        return redirect("/university/$translation->university_id/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $translation = Translation::find($id);
        $translation->delete();
        return redirect("/university/$translation->university_id/edit");
    }
}
