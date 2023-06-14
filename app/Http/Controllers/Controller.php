<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\Orders;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $team = Team::all();
        $cases = Cases::orderby('id', 'desc')->paginate(4);
        return view('index', compact(['team', 'cases']));
    }

    public function create() { 
        return view('order'); 
    }  
  
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'description' => 'nullable',
            'file' => 'file | nullable',
        ]);
        // dd($data['file']->getClientOriginalName());
        $data['status'] = "Новый";
        if(!empty($data['file'])){
            $data['file'] = Storage::disk('public')->put('files/orders', $data['file']);
        }
        Orders::create($data);

        return response()->json(['status'=>TRUE]);
    }
}
