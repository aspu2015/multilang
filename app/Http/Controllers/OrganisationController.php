<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class OrganisationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('organization.index',[
            'organizations' => Organization::all()
        ]);
    }

    public function show($id){

    }

    public function create(){
        return view('organization.OrganizationCreate');
    }
}
