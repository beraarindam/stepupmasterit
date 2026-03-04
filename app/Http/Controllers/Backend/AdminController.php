<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Course;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Campus;
use App\Models\Gallery;
use App\Models\Faq;
use App\Models\Banner;
use App\Models\Testimonial;

class AdminController extends Controller
{
    public function index()
    {
        $totalStudents = User::where('role', 'student')->count();
        $totalAdmins = User::where('role', 'admin')->count();
        $activeCourses = Course::where('status', 'active')->count();
        $totalServices = Service::where('status', 'active')->count();
        $totalBlogs = Blog::where('status', 'active')->count();

        $totalCampuses = Campus::where('status', 'active')->count();
        $activeGalleries = Gallery::where('status', 'active')->count();
        $activeFaqs = Faq::where('status', 'active')->count();
        $activeBanners = Banner::where('status', 'active')->count();
        $activeTestimonials = Testimonial::where('status', 'active')->count();

        $recentStudents = User::where('role', 'student')->latest()->take(5)->get();

        return view('backend.dashboard', compact(
            'totalStudents',
            'totalAdmins',
            'activeCourses',
            'totalServices',
            'totalBlogs',
            'totalCampuses',
            'activeGalleries',
            'activeFaqs',
            'activeBanners',
            'activeTestimonials',
            'recentStudents'
        ));
    }
}
