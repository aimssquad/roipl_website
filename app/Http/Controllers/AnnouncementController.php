<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'front.';
    }
    public function index(Request $request){
        $announcements = Announcement::get();
        return view($this->prefix.'announcement', compact('announcements'));
    }

    public function details($id, $slug = null)
    {
        $announcement = Announcement::findOrFail($id);
        return view($this->prefix.'announcement-detail', compact('announcement'));
    }
}
