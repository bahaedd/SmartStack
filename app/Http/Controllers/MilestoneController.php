<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Milestone;
use App\Models\Goal;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Goal $goal)
    {
        $milestones = $goal->milestones()->latest()->get();

        return view('milestones.index', [
            'goal' => $goal,
            'milestones' => $milestones,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Goal $goal)
    {
        return view('milestones.create', compact('goal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Goal $goal)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        $goal->milestones()->create($validated);

        return redirect()->route('goals.milestones.index', $goal)
        ->with('success', 'Milestone added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Milestone $milestone)
    {
        return view('milestones.edit', compact('milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'completed' => 'sometimes|boolean',
        ]);

        $milestone->update($validated);

        return redirect()->route('goals.milestones.index', $goal)
        ->with('success', 'Milestone updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        $milestone->delete();

        return back()->with('success', 'Milestone deleted.');
    }
}
