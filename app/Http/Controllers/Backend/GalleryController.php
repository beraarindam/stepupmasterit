<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;

use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Gallery::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        return '<img src="' . asset($row->image) . '" class="w-12 h-10 object-cover rounded-lg border">';
                    }
                    return '<div class="w-12 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400"><i class="fas fa-images"></i></div>';
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
                                <a href="' . route('admin.galleries.edit', $row->id) . '" class="text-blue-500 hover:bg-blue-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="' . route('admin.galleries.destroy', $row->id) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this gallery item?\');" class="inline">
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

        return view('backend.galleries.index');
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
