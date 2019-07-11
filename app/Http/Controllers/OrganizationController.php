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

    public function create()
    {
        return view('organization.create');
    }

    public function edit($id){
        return View('organization.edit',[
            'organization' => Organization::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $organization = Organization::find($id);
        $organization->name = $request->get('name');
        $organization->save();
        return redirect('/organization');
    }

    public function store(Request $request)
    {
        $organization = new Organization;
        $organization->name= $request->get('name');
        $organization->save();
        return redirect('/organization');
    }

    public function destroy(Request $request, $id)
    {
        $organization = Organization::find($id);
        $organization->delete();
        return redirect('/organization');
    }
}
