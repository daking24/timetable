<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Student;
use Validator;

class StudentController extends Controller
{

    public function CreateForm(Department $department)
    {
        $departments = $department->get();
        return view('student.create', compact('departments'));
    }
    public function createStudent(Student $student, Request $request)
    {
        //ddd($student);
        try {

            $this->validate($request, [
                'email' => 'required|string|email|unique:lecturers,email',
                'department_id' => 'required|exists:departments,id',
                'phone'   => 'required|min:11',

            ]);
           $input = $request->all();
           $input['name'] = $request->input('name');
           $input['email'] = $request->input('email');
           $input['level'] = $request->input('level');
           $input['matric_no'] = $request->input('matric_no');
           $input['department_id'] = $request->input('department_id');
           $input['phone'] = $request->input('phone');


           $student = Student::create($input);
        //    ddd($student);
            if (!$student) {
                return redirect()
                    ->back()
                    ->withErrors($student);
            } else {
                return redirect()
                    ->back()
                    ->with('message', 'Student Created successfully!' );

                }
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e->getMessage());
        }


    }

    public function viewStudent(Student $student)
    {
        $students = $student->with('department')->get();
        return view('student.view', compact('students'));
    }


    public function editStudent (Student $student, Department $department, $id)
    {
        $students = $student->with('department')->where('id', $id)->first();
        //ddd($departments);
        $departments = $department->where('is_active', true)->get();
        return view('student.edit-student', compact('students','departments'));
    }

    public function UpdateStudent(Student $student, Request $request, $id)
    {
        try {
            $updateDept = $student->find($id);
            $updateDept->name = $request['name'];
            $updateDept->email = $request['email'];
            $updateDept->phone = $request['phone'];
            $updateDept->matric_no = $request['matric_no'];
            $updateDept->department_id = $request['department_id'];
            $updateDept->level = $request['level'];
            $updateDept->save();
            // ddd($updateDept);
            return redirect()
                ->back()
                ->with('message', 'Student Updated successfully!');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e->getMessage());
        }
    }

}
