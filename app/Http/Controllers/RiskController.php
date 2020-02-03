<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Template;
use App\User;
use Illuminate\Http\Request;

class RiskController extends Controller
{
    public function create ()
    {
    }

    public function store(Request $request)
    {
    }

    public function edit ()
    {
        return view('issues.edit');
    }
    public function index ()
    {
        return view('issues.index');
    }
    public function board ()
    {
        return view('issues.board');
    }
    public function buttonIndex()
    {
        return view('issues.button');
    }

//    public function updateStatus (Request $request)
//    {
//        if ($request->sortable1) {
//            Issue::whereIn('_id', $request->sortable1)->update([
//                'status' => Issue::DANGTHUCHIEN
//            ]);
//        }
//        if ($request->sortable2) {
//            Issue::whereIn('_id', $request->sortable2)->update([
//                'status' => Issue::QUAHAN
//            ]);
//        }
//        if ($request->sortable3) {
//            Issue::whereIn('_id', $request->sortable3)->update([
//                'status' => Issue::CHO
//            ]);
//        }
//        if ($request->sortable4) {
//            Issue::whereIn('_id', $request->sortable4)->update([
//                'status' => Issue::HOANTHANH
//            ]);
//        }
//        if ($request->sortable5) {
//            Issue::whereIn('_id', $request->sortable5)->update([
//                'status' => Issue::TAMDUNG
//            ]);
//        }
//        if ($request->sortable6) {
//            Issue::whereIn('_id', $request->sortable6)->update([
//                'status' => Issue::DAHUY
//            ]);
//        }
//
//    }
}
