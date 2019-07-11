<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class OrganizationController extends Controller
{

    public function index()
    {
        return view('organization.index',[
            'organizations' => Organization::get()
        ]);
    }

    public function create(){
        return view('organization.create');
    }

    public function store(Request $request)
    {
        $organization = new Organization;
        $organization->name= $request->get('OrganizationName');
        $organization->save();
        return redirect('/organization');
    }
}
