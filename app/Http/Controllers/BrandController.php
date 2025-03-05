<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'front.';
    }
    public function brands(Request $request) {
        $brands = Brand::all();
        return view($this->prefix.'brands', compact('brands'));
    }
    public function brandDetails($title) {
        $brand = Brand::where('title', $title)->firstOrFail();
        $pageTitle = $brand->title;

        return view($this->prefix . 'brand-details', compact('brand', 'pageTitle'));
    }
}
