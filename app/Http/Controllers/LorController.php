<?php

namespace App\Http\Controllers;


use App\Models\EventFolder;
use Illuminate\Http\Request;
use App\Models\Event;

class LorController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'front.';
    }
    public function events(Request $request){
        $datas = Event::orderBy('id', 'asc')->limit(4)->get();
        return view($this->prefix.'events', compact('datas'));
    }
    public function eventDetails(Event $event){
        $folders = $event->folders;
        return view($this->prefix . 'events-details', compact('event','folders'));

    }
    public function detailsImage(Event $event, EventFolder $folder){
        $images = $folder->images;
        // dd($folder);
        return view($this->prefix . 'events-details-image', compact('event','folder','images'));

    }
}
