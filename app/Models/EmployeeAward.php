<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EmployeeAward extends Model
{
use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'team',
        'month',
        'card_color',
    ];
}
