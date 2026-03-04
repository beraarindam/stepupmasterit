<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('backend.services.index', compact('services'));
    }

    public function create()
    {
        return view('backend.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['icon_image']);
        $data['slug'] = Str::slug($request->title) . '-' . time();

        if ($request->hasFile('icon_image')) {
            $file = $request->file('icon_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/services'), $filename);
            $data['icon_image'] = 'uploads/services/' . $filename;
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function show(string $id)
    {
        // Not used explicitly usually in admin pane, fallback to edit
        return redirect()->route('admin.services.edit', $id);
    }

    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('backend.services.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['icon_image']);
        if ($request->title !== $service->title) {
            $data['slug'] = Str::slug($request->title) . '-' . time();
        }

        if ($request->hasFile('icon_image')) {
            // Check if old image exists, could delete it here
            if ($service->icon_image && file_exists(public_path($service->icon_image))) {
                unlink(public_path($service->icon_image));
            }

            $file = $request->file('icon_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/services'), $filename);
            $data['icon_image'] = 'uploads/services/' . $filename;
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        if ($service->icon_image && file_exists(public_path($service->icon_image))) {
            unlink(public_path($service->icon_image));
        }
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
