<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'front.';
    }
    public function index(Request $request){
        return view($this->prefix.'announcement');
    }

    public function details(){
        return view($this->prefix.'announcement-detail');
    }
}
