<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('backend.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('backend.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'author' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['image']);
        $data['slug'] = Str::slug($request->title) . '-' . time();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blogs'), $filename);
            $data['image'] = 'uploads/blogs/' . $filename;
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.blogs.edit', $id);
    }

    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.blogs.edit', compact('blog'));
    }

    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'author' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['image']);
        if ($request->title !== $blog->title) {
            $data['slug'] = Str::slug($request->title) . '-' . time();
        }

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blogs'), $filename);
            $data['image'] = 'uploads/blogs/' . $filename;
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}
