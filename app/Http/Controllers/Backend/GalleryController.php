<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('backend.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('backend.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/galleries'), $filename);
            $data['image'] = 'uploads/galleries/' . $filename;
        }

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery image uploaded successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.galleries.edit', $id);
    }

    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('backend.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            if ($gallery->image && file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/galleries'), $filename);
            $data['image'] = 'uploads/galleries/' . $filename;
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery image updated successfully.');
    }

    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        if ($gallery->image && file_exists(public_path($gallery->image))) {
            unlink(public_path($gallery->image));
        }
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery image deleted successfully.');
    }
}
