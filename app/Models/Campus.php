<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = ['title', 'slug', 'short_description', 'description', 'tab_overview', 'tab_descriptions', 'tab_career', 'tab_summary', 'image', 'status'];
}
