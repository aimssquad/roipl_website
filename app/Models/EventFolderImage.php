<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFolderImage extends Model
{
    use HasFactory;

    protected $fillable = ['event_folder_id', 'image_path'];

    public function folder()
    {
        return $this->belongsTo(EventFolder::class, 'event_folder_id');
    }
}
