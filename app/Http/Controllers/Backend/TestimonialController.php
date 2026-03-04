<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('backend.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('backend.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'designation' => 'nullable|max:255',
            'message' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/testimonials'), $filename);
            $data['image'] = 'uploads/testimonials/' . $filename;
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.testimonials.edit', $id);
    }

    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'designation' => 'nullable|max:255',
            'message' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            if ($testimonial->image && file_exists(public_path($testimonial->image))) {
                unlink(public_path($testimonial->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/testimonials'), $filename);
            $data['image'] = 'uploads/testimonials/' . $filename;
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->image && file_exists(public_path($testimonial->image))) {
            unlink(public_path($testimonial->image));
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
