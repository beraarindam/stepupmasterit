<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Campus;
use Illuminate\Support\Str;

class CampusController extends Controller
{
    public function index()
    {
        $campuses = Campus::latest()->get();
        return view('backend.campuses.index', compact('campuses'));
    }

    public function create()
    {
        return view('backend.campuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
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
            $file->move(public_path('uploads/campuses'), $filename);
            $data['image'] = 'uploads/campuses/' . $filename;
        }

        Campus::create($data);

        return redirect()->route('admin.campuses.index')->with('success', 'Campus created successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.campuses.edit', $id);
    }

    public function edit(string $id)
    {
        $campus = Campus::findOrFail($id);
        return view('backend.campuses.edit', compact('campus'));
    }

    public function update(Request $request, string $id)
    {
        $campus = Campus::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['image']);
        if ($request->title !== $campus->title) {
            $data['slug'] = Str::slug($request->title) . '-' . time();
        }

        if ($request->hasFile('image')) {
            if ($campus->image && file_exists(public_path($campus->image))) {
                unlink(public_path($campus->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/campuses'), $filename);
            $data['image'] = 'uploads/campuses/' . $filename;
        }

        $campus->update($data);

        return redirect()->route('admin.campuses.index')->with('success', 'Campus updated successfully.');
    }

    public function destroy(string $id)
    {
        $campus = Campus::findOrFail($id);
        if ($campus->image && file_exists(public_path($campus->image))) {
            unlink(public_path($campus->image));
        }
        $campus->delete();

        return redirect()->route('admin.campuses.index')->with('success', 'Campus deleted successfully.');
    }
}
