<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function createDepartment(Department $department, Request $request)
    {
        try{
            $department->create($request->all());
            return redirect()->back()->with('message', 'Department created successfully');
        } catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function viewDepartment(Department $department)
    {
        $dept = $department->get();

        return view('department.dept-list', compact('dept'));
    }

    public function editDepartment (Department $department, $id)
    {
        $departments = $department->where('id', $id)->first();
        //ddd($departments);
        return view('department.edit-department', compact('departments'));
    }

    public function UpdateDepartment(Department $department, Request $request, $id)
    {
        try {
            $updateDept = $department->find($id);
            $updateDept->name = $request['name'];
            $updateDept->save();
            return redirect()
                ->back()
                ->with('message', 'Department Updated successfully!');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e->getMessage());
        }
    }
}
