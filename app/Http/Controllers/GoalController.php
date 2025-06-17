<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goals = Goal::latest()->paginate(10);
        return view('goals.index', compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('goals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        Goal::create($validated);
        return redirect()->route('goals.index')->with('success', 'Goal created successfully.');
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
    public function edit(Goal $goal)
    {
        return view('goals.edit', compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goal $goal)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'completed' => 'sometimes|boolean',
        ]);

        $goal->update($validated);
        return redirect()->route('goals.index')->with('success', 'Goal updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goal $goal)
    {
        $goal->delete();
        return redirect()->route('goals.index')->with('success', 'Goal deleted successfully.');
    }
}
