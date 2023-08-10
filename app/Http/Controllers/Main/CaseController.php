<?php

namespace App\Http\Controllers\Main;

use App\Models\Cases;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class CaseController extends Controller
{
    

    public function index()
    {
        $locale = App::currentLocale();
        $cases = Cases::orderby('id', 'desc')->paginate(4);
        return view('cases', compact('cases', 'locale'));
    }
    
    public function case($url)
    {
        $locale = App::currentLocale();
        $case = Cases::firstWhere('url', '=', $url);
        return view('case', compact('case', 'locale'));
    }
}