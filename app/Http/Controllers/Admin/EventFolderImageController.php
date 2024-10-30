<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventFolder;
use App\Models\EventFolderImage;
use Illuminate\Http\Request;

class EventFolderImageController extends Controller
{
    public function destroy(Event $event, EventFolder $folder, EventFolderImage $image)
    {
        // Delete the image file from storage
        if (\Storage::disk('public')->exists($image->image_path)) {
            \Storage::disk('public')->delete($image->image_path);
        }

        // Delete the database record
        $image->delete();

        // Return a JSON response
        return response()->json(['message' => 'Image deleted successfully.']);
    }
}
