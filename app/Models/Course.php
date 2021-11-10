<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'lectuerer_id',
        'department_id',
        'code',
        'title',
        'units',
        'semester',
        'session',
        'level',
        'is_active',

    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
