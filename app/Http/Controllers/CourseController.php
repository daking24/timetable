<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Lecturer;
use App\Models\Course;

use Validator;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $lecturers = Lecturer::all();
        return view('courses.create', compact('departments', 'lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Course $courses, Request $request)
    {
        try {

            $this->validate($request, [
                'department_id' => 'required|exists:departments,id',
                'lecturer_id' => 'required|exists:lecturers,id',

            ]);
           $input = $request->all();
           $input['lecturer_id'] = $request->input('lecturer_id');
           $input['department_id'] = $request->input('department_id');
           $input['code'] = $request->input('code');
           $input['level'] = $request->input('level');
           $input['title'] = $request->input('title');
           $input['units'] = $request->input('units');
           $input['session'] = $request->input('session');
           $input['semester'] = $request->input('semester');
            
           $course = Course::create($input);
        //    ddd($student);
            if (!$course) {
                return redirect()
                    ->back()
                    ->withErrors($course);
            } else {
                return redirect()
                    ->back()
                    ->with('message', 'Course Created successfully!' );

                }
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e->getMessage());
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }


}
