<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'duration',
        'fee',
        'short_description',
        'description',
        'image',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }
}
