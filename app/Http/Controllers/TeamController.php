<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'status' => 'required',
            'img' => 'file | required',
        ]);

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
    public function update(Request $request, Team $team)
    {
        $data = $request->validate([
            'title' => 'required',
            'status' => 'required',
            'img' => 'file | required',
        ]);

        $data['img'] = Storage::disk('public')->put('images/team', $data['img']);

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
