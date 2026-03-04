<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Course;
use App\Models\Banner;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', 'active')->latest()->get();
        $services = Service::where('status', 'active')->latest()->take(6)->get();
        $courses = Course::where('status', 'active')->latest()->take(6)->get();
        $testimonials = Testimonial::where('status', 'active')->latest()->get();

        return view('frontend.index', compact('banners', 'services', 'courses', 'testimonials'));
    }
}
