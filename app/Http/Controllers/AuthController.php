<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function validate_login(Request $request)
    {
        $this->validate($request, [
            'id' =>  'required',
            'password'  =>  'required'
        ]);

        //$credentials = $request->only('id', 'password');

        if(auth()->guard('admin')->attempt(['id' => $request->input('id'),  'password' => $request->input('password')])){
            $user = auth()->guard('admin')->user();
            $role = $user->role; 
            switch ($role) {
            case 'admin':
                Session::put('login',TRUE);
                return redirect('admin');
                break;
            case 'super_admin':
                Session::put('login',TRUE);
                return redirect('super_admin');
                break; 
            }
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }

    public function dashboard()
    {
        if(auth()->guard('admin')->check())
        {
            $user = auth()->guard('admin')->user();
            $role = $user->role; 
            switch ($role) {
            case 'admin':
                Session::put('login',TRUE);
                return redirect('admin');
                break;
            case 'super_admin':
                Session::put('login',TRUE);
                return redirect('super_admin');
                break; 
            }
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }

    public function logout()
    {
        Session::flush();

        auth()->guard('admin')->logout();

        return redirect('login');
    }
}
