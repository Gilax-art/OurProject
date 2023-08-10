<?php

namespace App\Http\Controllers;

use App\Http\Requests\CasesUpdateRequest;
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
            'title_ru' => 'required',
            'title_en' => 'required',
            'link' => 'required',
            'url' => 'required',
            'img' => 'file | required',
        ]);

        if(!empty($request['description_ru'])){
            $data['description_ru'] = $request['description_ru'];
        }
        if(!empty($request['description_en'])){
            $data['description_en'] = $request['description_en'];
        }
        $data['img'] = Storage::disk('public')->put('images/cases', $data['img']);

        if(!empty($request['deadlines_ru'])){
            $data['deadlines_ru'] = $request['deadlines_ru'];
        }
        if(!empty($request['deadlines_en'])){
            $data['deadlines_en'] = $request['deadlines_en'];
        }
        if(!empty($request['technologies_ru'])){
            $data['technologies_ru'] = $request['technologies_ru'];
        }
        if(!empty($request['technologies_en'])){
            $data['technologies_en'] = $request['technologies_en'];
        }
        if(!empty($request['review_ru'])){
            $data['review_ru'] = $request['review_ru'];
        }
        if(!empty($request['review_en'])){
            $data['review_en'] = $request['review_en'];
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
    public function update(CasesUpdateRequest $request, Cases $case)
    {
        $data = $request->validated();

        foreach ($request->all(['deadlines_ru', 'deadlines_en', 'technologies_ru', 'technologies_en', 'review_ru', 'review_en', 'description_ru', 'description_en' ]) as $key => $value){
            if(!empty($value)){
                $data[$key] = $value;
            }
        }

        if(!empty($request['img'])){
            $case['img'] = Storage::disk('public')->delete('images/cases', $case['img']);
            $data['img'] = $request['img'];
            $data['img'] = Storage::disk('public')->put('images/cases', $data['img']);
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
