<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'semester',
        'session',
        'level',
        'schedule',
        'is_active',

    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function alreadyHas($condition)
    {
        return $this->where($condition)->exists();
    }
}
