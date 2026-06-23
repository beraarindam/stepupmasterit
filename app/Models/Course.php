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
        'intakes',
        'campuses',
        'delivery',
        'short_description',
        'description',
        'learning_outcomes',
        'image',
        'status'
    ];

    protected $casts = [
        'learning_outcomes' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }
}
