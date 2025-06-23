<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Goal extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'due_date' => 'datetime'
    ];

    protected $listeners = ['goalCreated' => '$refresh'];

    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }
}
