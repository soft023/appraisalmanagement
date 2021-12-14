<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class PolicyController extends Controller
{
   
public function ourpolicies()
{
return view('ourpolicies');
}   

public function dresscode()
{
return view('policies.dresscode');
}
public function hr()
{
return view('policies.hr');
}

public function operations()
{
return view('policies.operations');
}


}
