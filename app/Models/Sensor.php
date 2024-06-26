<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'hr',
        'steps',
        'workout_time',
        'bp',
        'energy_burn',
        'activity_level',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
