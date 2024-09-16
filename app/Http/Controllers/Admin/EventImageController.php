<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventImage;
use Illuminate\Http\Request;

class EventImageController extends Controller
{
    public function destroy($id)
    {
        $image = EventImage::find($id);

        if ($image) {
            // Delete the image file from storage if needed
            if (file_exists(storage_path('app/public/event_images/' . $image->file_name))) {
                unlink(storage_path('app/public/event_images/' . $image->file_name));
            }

            // Delete the image record from the database
            $image->delete();

            return redirect()->back()->with('success', 'Image deleted successfully.');
        }

        return redirect()->back()->with('error', 'Image not found.');
    }
}
