<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\InfoTranslation;

class InfoTranslationController extends Controller
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
        $categories = InfoTranslation::getCategories();
        return view('infoTranslation.index', [
            'categories' => $categories
        ]);
    }

    // страница «show/»
    public function show($id)
    {
        $sections = InfoTranslation::getSections($id);
        return view('infoTranslation.show', [
            'sections' => $sections
        ]);
    }

    public function getTranslations($id)
    {
        $sections = InfoTranslation::getSections($id);
        return view('infoTranslation.show', [
            'sections' => $sections
        ]);
    }

    
}