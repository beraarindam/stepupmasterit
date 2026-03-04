<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'duration',
        'fee',
        'short_description',
        'description',
        'image',
        'status'
    ];
}
