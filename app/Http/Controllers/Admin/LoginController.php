<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.';
    }

    public function index(){
        return view($this->prefix.'login');
    }

    public function login(Request $request){
        $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

        if (Auth::attempt($request->only('email','password'))) {
            $user = Auth::user();

            // this is the one way where u can create permission wise access but here i am using middleware -- AuthAdminmiddleware
            // if($user->hasRole('admin')){
                return redirect()->route('admin.dashboard');
            // }
            // else{
            //     Auth::logout();
            //     return back()->withErrors([
            //         'email' => 'you don not have to access admin area !',
            //         ]);
            // }
        }
        return back()->withErrors([
            'email' => 'Invalid email or password',
            ]);
    }
}
