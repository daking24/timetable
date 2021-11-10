<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Lecturer;

class CourseController extends Controller
{
    public function showCreateForm(Department $department, Lecturer $lecturer)
    {
        $departments = $department->get();
        $lecturers = $lecturer->get();
        return view('courses.create', compact('departments','lecturers'));
    }
}
