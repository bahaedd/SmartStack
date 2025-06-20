<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use Carbon\Carbon;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goals = Goal::latest()->paginate(10);

        // Group completed goals by month
        $completed = Goal::where('completed', true)
            ->whereNotNull('due_date')
            ->get()
            ->groupBy(fn($goal) => Carbon::parse($goal->due_date)->format('Y-m'))
            ->map(fn($group) => $group->count());

        // Group pending goals by month
        $pending = Goal::where('completed', false)
            ->whereNotNull('due_date')
            ->get()
            ->groupBy(fn($goal) => Carbon::parse($goal->due_date)->format('Y-m'))
            ->map(fn($group) => $group->count());

        // Generate list of last 12 months
        $allMonths = collect();
        $start = now()->subMonths(11)->startOfMonth();
        for ($i = 0; $i < 12; $i++) {
            $month = $start->copy()->addMonths($i)->format('Y-m');
            $allMonths->push($month);
        }

        // Format for ApexCharts
        $completedData = $allMonths->map(fn($month) => ['x' => $month, 'y' => $completed->get($month, 0)]);
        $pendingData = $allMonths->map(fn($month) => ['x' => $month, 'y' => $pending->get($month, 0)]);

        return view('goals.index', [
            'goals' => $goals,
            'completedData' => $completedData,
            'pendingData' => $pendingData,
        ]);
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
