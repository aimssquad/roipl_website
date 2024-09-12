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
    public function about(Request $request){
        return view($this->prefix.'about');

    }
    public function gallery(Request $request){
        return view($this->prefix.'gallery');

    }
    public function galleryDetails(Request $request){
        return view($this->prefix.'gallery-details');

    }
    public function brands(Request $request){
        return view($this->prefix.'brands');

    }
    public function events(Request $request){
        return view($this->prefix.'events');

    }
    public function eventDetails(Request $request){
        return view($this->prefix.'events-details');

    }
    public function visionnaire(Request $request){
        return view($this->prefix.'visionnaire');

    }
}
