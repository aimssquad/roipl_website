<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandLogo;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'front.';
    }
    public function index(){
        $brands = Brand::all();
        $logos = BrandLogo::all();
        return view($this->prefix.'home', compact('brands','logos'));

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

    public function visionnaire(Request $request){
        return view($this->prefix.'visionnaire');

    }
    public function teams(Request $request){
        return view($this->prefix.'teams');
    }
}
