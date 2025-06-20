<?php

namespace App\Livewire\Goals;

use Livewire\Component;
use App\Models\Goal;

class CreateGoal extends Component
{
    public $title;
    public $due_date;
    public $status = 'not started';
    public $showModal = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'due_date' => 'required|date',
        'status' => 'required|in:not started,in progress,completed',
    ];

    public function createGoal()
    {
        $this->validate();

        Goal::create([
            'title' => $this->title,
            'due_date' => $this->due_date,
            'status' => $this->status,
        ]);

        // reset inputs & close modal
        $this->reset(['title', 'due_date', 'status', 'showModal']);
        $this->dispatch('goalCreated'); // to refresh goal list if needed
        session()->flash('success', 'Goal created successfully!');
    }

    public function render()
    {
        return view('livewire.goals.create-goal');
    }
}
