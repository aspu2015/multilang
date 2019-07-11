<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class OrganisationController extends Controller
{
    public function index(){
        return Organization::get();
    }
}
