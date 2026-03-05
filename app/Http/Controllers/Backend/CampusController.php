<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Campus;
use Illuminate\Support\Str;

use Yajra\DataTables\Facades\DataTables;

class CampusController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Campus::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        return '<img src="' . asset($row->image) . '" class="w-12 h-10 object-cover rounded-lg border">';
                    }
                    return '<div class="w-12 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400"><i class="fas fa-building"></i></div>';
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
                                <a href="' . route('admin.campuses.edit', $row->id) . '" class="text-blue-500 hover:bg-blue-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="' . route('admin.campuses.destroy', $row->id) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this campus?\');" class="inline">
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

        return view('backend.campuses.index');
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
        $data['slug'] = create_slug(Campus::class, $request->title);

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
            $data['slug'] = create_slug(Campus::class, $request->title, $campus->id);
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
