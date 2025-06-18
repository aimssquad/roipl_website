<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Brand;
use App\Models\BrandLogo;
use App\Models\EmployeeAward;
use App\Models\EventFolder;
use App\Models\EventFolderImage;
use App\Models\Event;
use App\Models\Team;
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
        $images = EventFolderImage::where('event_folder_id', '=', '21')->get();



        // $events = Event::all();
        $events = Event::orderBy('id', 'asc')->limit(4)->get();
        return view($this->prefix.'home', compact('brands','logos','images','events'));

    }
    public function about(Request $request){
        $datas = About::orderBy('id', 'asc')->get();
        $logos = BrandLogo::all();
        return view($this->prefix.'about',compact('logos','datas'));

    }
    public function gallery(){
        $folders = EventFolder::where('description', '!=', 'Gallery')->get();
        return view($this->prefix.'gallery',compact('folders'));

    }
    public function galleryDetails($folder){
        $event_id_sql = EventFolder::where('id',$folder)->first();
        $event_id = $event_id_sql->event_id;
        $event = Event::where('id',$event_id)->first();


        $images = EventFolderImage::where('event_folder_id' ,$folder)->get();
        return view($this->prefix.'gallery-details',compact('images','event','event_id_sql'));

    }

    public function visionnaire(Request $request){
        return view($this->prefix.'visionnaire');

    }
    public function teams(Request $request){
        $awards = EmployeeAward::orderBy('month', 'desc')->get();
        $team = Team::orderBy('order_by', 'asc')->get();
        return view($this->prefix.'teams',compact('team','awards'));
    }
}
