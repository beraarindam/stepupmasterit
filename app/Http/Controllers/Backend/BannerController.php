<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('backend.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('backend.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|max:255',
            'subtitle' => 'nullable|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|max:255',
            'button_text' => 'nullable|max:255',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/banners'), $filename);
            $data['image'] = 'uploads/banners/' . $filename;
        }

        Banner::create($data);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.banners.edit', $id);
    }

    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.banners.edit', compact('banner'));
    }

    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'title' => 'nullable|max:255',
            'subtitle' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|max:255',
            'button_text' => 'nullable|max:255',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            if ($banner->image && file_exists(public_path($banner->image))) {
                unlink(public_path($banner->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/banners'), $filename);
            $data['image'] = 'uploads/banners/' . $filename;
        }

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);
        if ($banner->image && file_exists(public_path($banner->image))) {
            unlink(public_path($banner->image));
        }
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }
}
