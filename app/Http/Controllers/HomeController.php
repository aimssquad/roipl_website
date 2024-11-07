<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandLogo;
use App\Models\EventFolder;
use App\Models\EventFolderImage;
use App\Models\Event;
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
        $images = EventFolderImage::orderBy('created_at', 'desc')->take(10)->get();
        $events = Event::all();
        return view($this->prefix.'home', compact('brands','logos','images','events'));

    }
    public function about(Request $request){
        $logos = BrandLogo::all();
        return view($this->prefix.'about',compact('logos'));

    }
    public function gallery(){
        $folders = EventFolder::all();
        return view($this->prefix.'gallery',compact('folders'));

    }
    public function galleryDetails($folder){
        $event_id_sql = EventFolder::where('id',$folder)->first();
        $event_id = $event_id_sql->event_id;
        $event = Event::where('id',$event_id)->first();


        $images = EventFolderImage::where('event_folder_id' ,$folder)->get();
        return view($this->prefix.'gallery-details',compact('images','event'));

    }

    public function visionnaire(Request $request){
        return view($this->prefix.'visionnaire');

    }
    public function teams(Request $request){
        return view($this->prefix.'teams');
    }
}
