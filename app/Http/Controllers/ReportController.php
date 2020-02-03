<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function connectManagement()
    {
        return view('reports.connect_management');
    }

    public function options()
    {
        return view('reports.option');
    }
    public function analysis ()
    {
        return view('reports.analysis');
    }
    public function design ()
    {
        return view('reports.design');
    }
    public function storage()
    {
        return view('reports.storage');
    }

    public function report()
    {
        return view('reports.report');
    }
}
