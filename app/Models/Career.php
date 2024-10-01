<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'state_id','city_id', 'department', 'phone_number', 'cv'
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
