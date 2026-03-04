<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;

use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Testimonial::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        return '<img src="' . asset($row->image) . '" class="w-12 h-10 object-cover rounded-lg border">';
                    }
                    return '<div class="w-12 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400"><i class="fas fa-user-circle"></i></div>';
                })
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('designation', function ($row) {
                    return $row->designation ?? 'N/A';
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        return '<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Active</span>';
                    }
                    return '<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">Inactive</span>';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="flex items-center justify-end gap-2">
                                <a href="' . route('admin.testimonials.edit', $row->id) . '" class="text-blue-500 hover:bg-blue-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="' . route('admin.testimonials.destroy', $row->id) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this testimonial?\');" class="inline">
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

        return view('backend.testimonials.index');
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
