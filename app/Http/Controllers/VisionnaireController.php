<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visionnaire;

class VisionnaireController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'front.';
    }

    public function visionnaire(Request $request){
        dd("abbas");
        $datas = Visionnaire::orderBy('id', 'asc')->get();
        return view($this->prefix.'visionnaire', compact('datas'));
    }
}
