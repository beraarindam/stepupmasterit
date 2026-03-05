<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use Illuminate\Support\Str;

use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Service::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('icon_image', function ($row) {
                    if ($row->icon_image) {
                        return '<img src="' . asset($row->icon_image) . '" class="w-12 h-10 object-cover rounded-lg border">';
                    }
                    return '<div class="w-12 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400"><i class="fas fa-briefcase"></i></div>';
                })
                ->addColumn('title', function ($row) {
                    return $row->title;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        return '<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Active</span>';
                    }
                    return '<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">Inactive</span>';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="flex items-center justify-end gap-2">
                                <a href="' . route('admin.services.edit', $row->id) . '" class="text-blue-500 hover:bg-blue-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="' . route('admin.services.destroy', $row->id) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this service?\');" class="inline">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="text-red-500 hover:bg-red-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['icon_image', 'status', 'action'])
                ->make(true);
        }

        return view('backend.services.index');
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
        $data['slug'] = create_slug(Service::class, $request->title);

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
            $data['slug'] = create_slug(Service::class, $request->title, $service->id);
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
