<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.';
    }
    public function dashboard(Request $request)
    {
        return view($this->prefix.'dashboard');
    }
    public function logout(Request $request){
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect()->route('admin.login')->with('Logout successfully');
    }
}
