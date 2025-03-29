<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'front.';
    }

    public function index(Request $request){
        $page = Page::get();
        return view($this->prefix.'page', compact('page'));
    }

    public function details($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view($this->prefix.'page-details', compact('page'));
    }


}
