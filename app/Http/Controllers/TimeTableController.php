<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Course;
use App\Models\Venue;
use App\Models\TimeTable;

class TimeTableController extends Controller
{
    public function showCreateForm(Department $department)
    {
        $departments = $department->where('is_active', true)->get();
        return view('timetable.create', compact('departments'));
    }

    public function generate(Course $course, TimeTable $table)
    {
        $condition = request()->all();
        ddd($condition);
        if (!isset($condition['department'])) $condition['department'] = 0;

        $courses = $course->where($condition)->get()->toArray();

        $levelWideCourses = null;
        $newCondition = $condition;
        $newCondition['department'] = 0;
        if ($table->alreadyHas($newCondition)) {
           $levelWideCourses = $table->where($newCondition)->first()->schedule;
        }

        try{
            $timeTable =  new TimeTableGenerator($courses);
            $timeTable->levelWideCourse(json_decode($levelWideCourses, true));
            $timeTable = $timeTable->generate($condition['dept']);

            if ($table->alreadyHas($condition)) {
                $table->where($condition)->update(['schedule' => json_encode($timeTable) ]);
            } else {
                $table->create([
                    'department_id'          => $condition['department'] ?? 0,
                    'level'         => $condition['level'],
                    'semester'      => $condition['semester'],
                    'session'       => $condition['session'],
                    'schedule'      => json_encode($timeTable)
                ]);
            }
            return redirect()->route('timetable.index', $condition);
        } catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


}
