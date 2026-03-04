<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        return view('backend.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('backend.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'duration' => 'nullable|max:255',
            'fee' => 'nullable|max:255',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['image']);
        $data['slug'] = Str::slug($request->title) . '-' . time();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/courses'), $filename);
            $data['image'] = 'uploads/courses/' . $filename;
        }

        Course::create($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.courses.edit', $id);
    }

    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        return view('backend.courses.edit', compact('course'));
    }

    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'duration' => 'nullable|max:255',
            'fee' => 'nullable|max:255',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['image']);
        if ($request->title !== $course->title) {
            $data['slug'] = Str::slug($request->title) . '-' . time();
        }

        if ($request->hasFile('image')) {
            if ($course->image && file_exists(public_path($course->image))) {
                unlink(public_path($course->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/courses'), $filename);
            $data['image'] = 'uploads/courses/' . $filename;
        }

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        if ($course->image && file_exists(public_path($course->image))) {
            unlink(public_path($course->image));
        }
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
