<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'small_description',
        'long_description',
        'image1',
        'image2',
    ];
}
