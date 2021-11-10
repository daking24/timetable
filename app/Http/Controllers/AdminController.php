<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class AdminController extends Controller
{
    public function showDashboard(){
        return view('dashboard');
    }
    public function login(Request $request)
    {
        try {

            $request['email'] = $request->input('email');
            $request['password'] = $request->input('password');
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
            if (Auth::guard('admins')->attempt($request->only('email', 'password'))) {
                return redirect()
                    ->intended(route('dashboard', [
                        'admin' => Auth::guard('admins')->user(),
                    ]))
                    ->with('message', 'You are Logged in as Admin!');
            } else {
                return redirect()
                    ->back()
                    ->withErrors('Invalid Login credentials or user does not exists!');
            }
        } catch (Exception $e) {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors($e->getMessage());
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
