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
            'url' => 'required',
            'img' => 'file | required',
        ]);

        if(!empty($request['description'])){
            $data['description'] = $request['description'];
        }
        $data['img'] = Storage::disk('public')->put('images/cases', $data['img']);
        
        if(!empty($request['deadlines'])){
            $data['deadlines'] = $request['deadlines'];
        }
        if(!empty($request['technologies'])){
            $data['technologies'] = $request['technologies'];
        }
        if(!empty($request['review'])){
            $data['review'] = $request['review'];
        }
        if(!empty($request['screenshots'])){
            foreach($request['screenshots'] as $screenshot):
                $arrayLinks[] = Storage::disk('public')->put('images/cases/screenshots/', $screenshot);
            endforeach;
            $data['screenshots'] = json_encode($arrayLinks);
        }

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
            'url' => 'required',
        ]);
        if(!empty($request['description'])){
            $data['description'] = $request['description'];
        }
        if(!empty($request['img'])){
            $case['img'] = Storage::disk('public')->delete('images/cases', $case['img']);
            $data['img'] = $request['img'];
            $data['img'] = Storage::disk('public')->put('images/cases', $data['img']);
        }
        if(!empty($request['deadlines'])){
            $data['deadlines'] = $request['deadlines'];
        }
        if(!empty($request['technologies'])){
            $data['technologies'] = $request['technologies'];
        }
        if(!empty($request['review'])){
            $data['review'] = $request['review'];
        }
        if(!empty($request['screenshots'])){
            $screenshotsDel = json_decode($case['screenshots']);
            foreach($screenshotsDel as $screenshotDel):
                Storage::disk('public')->delete('images/cases/screenshots/', $screenshotDel);
            endforeach;

            foreach($request['screenshots'] as $screenshot):
                $arrayLinks[] = Storage::disk('public')->put('images/cases/screenshots/', $screenshot);
            endforeach;
            $data['screenshots'] = json_encode($arrayLinks);
        }

        $case->update($data);

        return redirect()->route('cases.index')->with('success','Кейс обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cases $case)
    {
        if(!empty($case['screenshots'])){
            $screenshots = json_decode($case['screenshots']);
            foreach($screenshots as $screenshot):
                Storage::disk('public')->delete('images/cases/screenshots/', $screenshot);
            endforeach;
        }
        $case['img'] = Storage::disk('public')->delete('images/cases', $case['img']);
        $case->delete();
        return redirect()->route('cases.index')->with('success','Кейс удалён');
    }
}
