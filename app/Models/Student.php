<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'department_id',
        'matric_no',
        'level',
        'is_active',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
