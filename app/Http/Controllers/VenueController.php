<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use App\Models\TimeTable;
use App\Models\Course;
use App\Models\Lecturer;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::with('timetable', 'course', 'lecturer')->get();
        return view('venue.view', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $lecturers = Lecturer::all();
        $time_tables = TimeTable::all();
        return view('venue.create', compact('courses', 'lecturers', 'time_tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'course_id' => 'required|exists:courses,id',
                'time_tables_id' => 'required|exists:time_tables,id',
            ]);

            $input = $request->all();
            $input['time_tables_id'] = $request->input('time_tables_id');
            $input['course_id'] = $request->input('course_id');
            $input['name'] = $request->input('name');
            $input['day'] = $request->input('day');
            $input['start'] = $request->input('start');
            $input['stop'] = $request->input('stop');

            $venue = Venue::create($input);
            
            if (!$venue) {
                return redirect()
                        ->back()
                        ->with('error', 'Venue could not be created');
            } else {
                return redirect()
                        ->route('venue.index')
                        ->with('success', 'Venue created successfully');
            }
        
        }
        catch (\Exception $e) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venue = Venue::find($id);
        $courses = Course::all();
        $lecturers = Lecturer::all();
        $time_tables = TimeTable::all();
        return view('venue.edit', compact('venue', 'courses', 'lecturers', 'time_tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'course_id' => 'required|exists:courses,id',
                'time_tables_id' => 'required|exists:time_tables,id',
            ]);

            $input = $request->all();
            $input['time_tables_id'] = $request->input('time_table_id');
            $input['course_id'] = $request->input('course_id');
            $input['name'] = $request->input('name');
            $input['day'] = $request->input('day');
            $input['start'] = $request->input('start');
            $input['stop'] = $request->input('stop');

            $venue = Venue::find($id);
            $venue->update($input);
            
            if (!$venue) {
                return redirect()
                        ->back()
                        ->with('error', 'Venue could not be updated');
            } else {
                return redirect()
                        ->route('venue.index')
                        ->with('success', 'Venue updated successfully');
            }
        
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $venue = Venue::find($id);
            $venue->delete();
            return redirect()
                    ->route('venue.index')
                    ->with('success', 'Venue deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


}
