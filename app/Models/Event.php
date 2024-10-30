<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventImage;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'image', 'event_date', 'event_time', 'place'];



    public function folders()
    {
        return $this->hasMany(EventFolder::class);
    }

}
