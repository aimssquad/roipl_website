<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Event;

class LorController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'front.';
    }
    public function events(Request $request){
        $datas = Event::all();
        return view($this->prefix.'events', compact('datas'));
    }
    public function eventDetails(Request $request,$id){
        $event = Event::with('images')->findOrFail($id);
        return view($this->prefix . 'events-details', compact('event'));

    }
}
