<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required'
        ]);
        try {
            $user = User::where('name', $request->name)->first();
            $password = Hash::make($request->password);

            if(Hash::check($request->password, $user->password)){
                if (Auth::attempt($credentials)) {
                    // Authentication passed...
                    return redirect()->intended('/admin');
                }else{
                    Session::flash('password_wrong','Your Email or Password is Incorrect, Please Try Again!');
                    return redirect()->back();
                }
            }else{
                Session::flash('password_wrong','Your Email or Password is Incorrect, Please Try Again!');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Session::flash('password_wrong','Your Email or Password is Incorrect, Please Try Again!');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
