<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisionnaireDetail;
use App\Models\Visionnaire;
use App\Models\VisionnaireDetailImage;

class ImageController extends Controller
{
    public function delete($id)
    {
        $image = VisionnaireDetailImage::find($id);

        if (!$image) {
            return response()->json(['success' => false, 'message' => 'Image not found.'], 404);
        }

        // Delete the file from storage
        if ($image->image_path && \Storage::disk('public')->exists($image->images)) {
            \Storage::disk('public')->delete($image->images);
        }

        // Delete the record from the database
        $image->delete();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
    }

}
