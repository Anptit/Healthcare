<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'user_id',
        'email',
        'phone',
        'time',
        'date',
        'address',
        'disease',
    ];

    public function isManagedByAdmin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function isCreatedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
