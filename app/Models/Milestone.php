<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Milestone extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }
}
