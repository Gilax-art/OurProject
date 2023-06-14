<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cases = Cases::orderby('id', 'desc')->paginate(5);
        return view('admin.cases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'link' => 'required',
            'img' => 'file | required',
        ]);

        if(!empty($request['description'])){
            $data['description'] = $request['description'];
        }

        $data['img'] = Storage::disk('public')->put('images/cases', $data['img']);

        Cases::create($data);

        return redirect()->route('cases.index')->with('success','Новый кейс добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cases $case)
    {
        return view('admin.cases.show', compact('case'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cases $case)
    {
        return view('admin.cases.edit', compact('case'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cases $case)
    {
        $data = $request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);

        if(!empty($request['description'])){
            $data['description'] = $request['description'];
        }
        if(!empty($request['img'])){
            $case['img'] = Storage::disk('public')->delete('images/cases', $case['img']);
            $data['img'] = $request['img'];
            $data['img'] = Storage::disk('public')->put('images/cases', $data['img']);
        }

        $case->update($data);

        return redirect()->route('cases.index')->with('success','Кейс обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cases $case)
    {
        $case->delete();
        $case['img'] = Storage::disk('public')->delete('images/cases', $case['img']);
        return redirect()->route('cases.index')->with('success','Кейс удалён');
    }
}
