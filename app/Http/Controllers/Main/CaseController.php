<?php

namespace App\Http\Controllers\Main;

use App\Models\Cases;
use App\Http\Controllers\Controller;

class CaseController extends Controller
{
    public function index()
    {
        $cases = Cases::orderby('id', 'desc')->paginate(4);
        return view('cases', compact('cases'));
    }

    public function case($url)
    {
        $case = Cases::firstWhere('url', '=', $url);
        return view('case', compact('case'));
    }
}