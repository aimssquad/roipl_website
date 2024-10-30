<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFolder extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'image_path', 'description'];


    public function images()
    {
        return $this->hasMany(EventFolderImage::class);
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
