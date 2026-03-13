<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Branch;
use App\Models\Campus;
use App\Models\Banner;
use App\Models\Testimonial;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', 'active')->latest()->get();
        $services = Service::where('status', 'active')->latest()->take(3)->get();
        $courses = Course::where('status', 'active')->latest()->take(6)->get();
        $testimonials = Testimonial::where('status', 'active')->latest()->get();

        return view('frontend.index', compact('banners', 'services', 'courses', 'testimonials'));
    }

    public function sitemap()
    {
        $services = Service::where('status', 'active')->orderBy('title')->get();
        $course_categories = CourseCategory::where('status', 'active')->orderBy('name')->get();
        $courses = Course::where('status', 'active')->orderBy('title')->get();
        $blogs = Blog::where('status', 'active')->latest()->get();
        $campuses = Campus::where('status', 'active')->orderBy('title')->get();

        return view('frontend.sitemap', compact('services', 'course_categories', 'courses', 'blogs', 'campuses'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function faq()
    {
        $faqs = \App\Models\Faq::where('status', 'active')->get();
        return view('frontend.faq', compact('faqs'));
    }

    public function contact()
    {
        $branches = Branch::where('status', 'active')->orderBy('sort_order')->orderBy('name')->get();
        return view('frontend.contact', compact('branches'));
    }

    public function gallery()
    {
        $galleries = \App\Models\Gallery::where('status', 'active')->latest()->get();
        return view('frontend.gallery', compact('galleries'));
    }

    public function services()
    {
        $services = Service::where('status', 'active')->latest()->get();
        return view('frontend.services', compact('services'));
    }

    public function courses()
    {
        $courses = Course::where('status', 'active')->latest()->paginate(12);
        $categories = CourseCategory::where('status', 'active')->orderBy('name')->get();
        return view('frontend.courses', compact('courses', 'categories'));
    }

    public function categoryCourses($slug)
    {
        $category = CourseCategory::where('slug', $slug)->where('status', 'active')->firstOrFail();
        $courses = Course::where('category_id', $category->id)->where('status', 'active')->latest()->paginate(12);
        $categories = CourseCategory::where('status', 'active')->orderBy('name')->get();
        return view('frontend.courses', compact('courses', 'categories', 'category'));
    }

    public function courseDetails($slug)
    {
        $course = Course::where('slug', $slug)->where('status', 'active')->firstOrFail();
        $related_courses = Course::where('category_id', $course->category_id)->where('id', '!=', $course->id)->where('status', 'active')->latest()->take(3)->get();
        return view('frontend.course_details', compact('course', 'related_courses'));
    }

    public function serviceDetails($slug)
    {
        $service = Service::where('slug', $slug)->where('status', 'active')->firstOrFail();
        $other_services = Service::where('id', '!=', $service->id)->where('status', 'active')->latest()->take(5)->get();
        return view('frontend.service_details', compact('service', 'other_services'));
    }

    public function campus()
    {
        $campuses = Campus::where('status', 'active')->latest()->get();
        return view('frontend.campus', compact('campuses'));
    }

    public function campusDetails($slug)
    {
        $campus = Campus::where('slug', $slug)->where('status', 'active')->firstOrFail();
        $other_campuses = Campus::where('id', '!=', $campus->id)->where('status', 'active')->latest()->take(5)->get();
        return view('frontend.campus_details', compact('campus', 'other_campuses'));
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }
}
