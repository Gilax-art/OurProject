<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamStoreRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team = Team::orderby('id', 'desc')->paginate(5);
        return view('admin.team.index', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamStoreRequest $request)
    {
        $data = $request->validated();

        $data['img'] = Storage::disk('public')->put('images/team', $data['img']);

        Team::create($data);

        return redirect()->route('team.index')->with('success','Новый участник добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('admin.team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamUpdateRequest $request, Team $team)
    {
        $data = $request->validated();

        if(!empty($request['img'])){
            $team['img'] = Storage::disk('public')->delete('images/team', $team['img']);
            $data['img'] = $request['img'];
            $data['img'] = Storage::disk('public')->put('images/team', $data['img']);
        }

        $team->update($data);

        return redirect()->route('team.index')->with('success','Участник обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();
        $team['img'] = Storage::disk('public')->delete('images/team', $team['img']);
        return redirect()->route('team.index')->with('success','Участник удалён');
    }
}
