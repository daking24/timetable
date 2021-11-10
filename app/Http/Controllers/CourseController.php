<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class CourseController extends Controller
{
    public function showCreateForm(Department $department)
    {
        $departments = $department->get();
        return view('courses.create', compact('departments'));
    }
}
