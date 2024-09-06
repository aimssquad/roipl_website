<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'front.';
    }
    public function index(Request $request){
        return view($this->prefix.'home');

    }
    public function contact(Request $request){
        return view($this->prefix.'contact');

    }
}
