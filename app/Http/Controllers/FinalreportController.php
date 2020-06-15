<?php

namespace App\Http\Controllers;

use App\Finalreport;
use Illuminate\Http\Request;
use App\Exports\FinalRep;


use Maatwebsite\Excel\Facades\Excel;



class FinalreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
       return Excel::download(new FinalRep(), 'finalreports.xlsx');
    }

    


}
