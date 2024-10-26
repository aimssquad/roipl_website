<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventFolder;

class EventFolderController extends Controller
{
    public function index(Event $event)
    {
        $folders = $event->folders;
        return view('admin.event-folders.index', compact('event', 'folders'));
    }
}
