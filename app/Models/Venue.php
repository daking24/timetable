<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;
    protected $fillable = [
        'time_tables_id',
        'course_id',
        'day',
        'start',
        'stop',
        'name',
        'is_active',

    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function timetable()
    {
        return $this->belongsTo(TimeTable::class, 'time_tables_id');
    }
}
