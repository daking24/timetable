<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('superadmin.auth');
    }
    public function login(Request $request)
    {
        try {

            $request['email'] = $request->input('superadmin_email');
            $request['password'] = $request->input('superadmin_password');
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
            //ddd($validator);
            if (Auth::guard('superadmin')->attempt($request->only('email', 'password'))) {
                return redirect()
                    ->intended(route('superadmin.dashboard', [
                        'admin' => Auth::guard('superadmin')->user(),
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

}
