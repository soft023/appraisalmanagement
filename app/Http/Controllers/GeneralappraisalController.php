<?php

namespace App\Http\Controllers;

use App\Generalappraisal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Result;
use App\Generalappraisal;
use App\Quantitative;
use App\Supervisor;
use App\Position;
use App\Gradelevel;
use App\Department;
use App\Keyresultareaquestion;
use App\Keyresultareaanswer;
use App\Keyarea;
use App\Accountability;
use App\Reliability;
use App\Initiative;
use App\Customerfocus;
use App\Efficiency;
use App\Professionalism;
use App\Qualitativesresult;

use Auth;

use Redirect;
use Session;

class GeneralappraisalController extends Controller
{
    

public function __construct()
{

$this->middleware('auth');
}


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Generalappraisal  $generalappraisal
     * @return \Illuminate\Http\Response
     */
    public function show(Generalappraisal $generalappraisal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Generalappraisal  $generalappraisal
     * @return \Illuminate\Http\Response
     */
    public function edit(Generalappraisal $generalappraisal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Generalappraisal  $generalappraisal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Generalappraisal $generalappraisal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Generalappraisal  $generalappraisal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Generalappraisal $generalappraisal)
    {
        //
    }
}
