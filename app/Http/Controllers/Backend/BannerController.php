<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;

use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Banner::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        return '<img src="' . asset($row->image) . '" class="w-12 h-10 object-cover rounded-lg border">';
                    }
                    return '<div class="w-12 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400"><i class="fas fa-image"></i></div>';
                })
                ->addColumn('title', function ($row) {
                    return $row->title ?? 'N/A';
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        return '<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Active</span>';
                    }
                    return '<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">Inactive</span>';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="flex items-center justify-end gap-2">
                                <a href="' . route('admin.banners.edit', $row->id) . '" class="text-blue-500 hover:bg-blue-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="' . route('admin.banners.destroy', $row->id) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this banner?\');" class="inline">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="text-red-500 hover:bg-red-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['image', 'status', 'action'])
                ->make(true);
        }

        return view('backend.banners.index');
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
