<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionnaireDetailImage extends Model
{
    use HasFactory;

    protected $fillable = ['visionnaire_detail_id', 'images'];

    public function vision()
    {
        return $this->belongsTo(VisionnaireDetail::class, 'id');
    }
}
