<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = [
        'title',
        'description',
        'location',
        'job_type',
        'last_date_to_apply',
        'is_active',
    ];


    public function applications()
    {
        return $this->hasMany(Career::class, 'job_id');
    }
}


