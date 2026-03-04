<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Course::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        return '<img src="' . asset($row->image) . '" class="w-12 h-10 object-cover rounded-lg border">';
                    }
                    return '<div class="w-12 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400"><i class="fas fa-book"></i></div>';
                })
                ->addColumn('title', function ($row) {
                    return $row->title;
                })
                ->addColumn('duration_fee', function ($row) {
                    return '<i class="far fa-clock mr-1 text-gray-400"></i> ' . ($row->duration ?? 'N/A') . ' <br>
                            <i class="fas fa-money-bill-wave mr-1 text-gray-400"></i> ' . ($row->fee ?? 'N/A');
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        return '<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Active</span>';
                    }
                    return '<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">Inactive</span>';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="flex items-center justify-end gap-2">
                                <a href="' . route('admin.courses.edit', $row->id) . '" class="text-blue-500 hover:bg-blue-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="' . route('admin.courses.destroy', $row->id) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this course?\');" class="inline">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="text-red-500 hover:bg-red-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['image', 'duration_fee', 'status', 'action'])
                ->make(true);
        }

        return view('backend.courses.index');
    }

    public function create()
    {
        return view('backend.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'duration' => 'nullable|max:255',
            'fee' => 'nullable|max:255',
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
            $file->move(public_path('uploads/courses'), $filename);
            $data['image'] = 'uploads/courses/' . $filename;
        }

        Course::create($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.courses.edit', $id);
    }

    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        return view('backend.courses.edit', compact('course'));
    }

    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'duration' => 'nullable|max:255',
            'fee' => 'nullable|max:255',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->except(['image']);
        if ($request->title !== $course->title) {
            $data['slug'] = Str::slug($request->title) . '-' . time();
        }

        if ($request->hasFile('image')) {
            if ($course->image && file_exists(public_path($course->image))) {
                unlink(public_path($course->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/courses'), $filename);
            $data['image'] = 'uploads/courses/' . $filename;
        }

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        if ($course->image && file_exists(public_path($course->image))) {
            unlink(public_path($course->image));
        }
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
