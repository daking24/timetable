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
    public function store(Request $request)
    {
        try{
            $data = validator::make($request->all(),[
                'department_id' => 'required|exists:departments,id',
                'lecturer_id' => 'required|exists:lecturers,id',
                'session' => 'required',
                'semester' => 'required|string',
                'level' => 'required',
                'title' => 'required|string|max:255',
                'code' => 'required|string|max:10',
                'units' => 'required|string',
            ]);
            if ($validator->fails()){
                return redirect()
                     ->back()
                     ->withErrors($validator);
            }
            $course = Course::create($data);
            dd($course);
            if (!$course) {
                return redirect()
                     ->back()
                     ->withErrors($course);
            } else {
                return redirect()
                     ->back()
                     ->with('message', 'Course Created Successfully!');
            }
        } catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
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
