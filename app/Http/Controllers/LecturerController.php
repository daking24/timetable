<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lecturer $lecturer)
    {
        $lecturers = $lecturer->all();

        return view('staff.view', compact('lecturers'));
    }
    
        
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Lecturer $lecturer, Request $request)
    {
        try{
            $lecturer->create($request->all());
            return redirect()->back()->with('message', 'Lecturer added successfully');
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
    public function show(Lecturer $lecturer, $id)
    {
        
        $lecturer = $lecturer->find($id);
        return view('staff.edit', compact('lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer ,$id)
    {
        $lecturer = $lecturer->find($id);
        return view('staff.edit', compact('lecturer'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Lecturer $lecturer ,Request $request, $id)
    {
        try{
            $lecturer->find($id)->update($request->all());
            return redirect()->back()->with('message', 'Lecturer updated successfully');
        } catch (\Exception $e)
        {
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
        //
    }
}
