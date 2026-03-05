<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CourseCategory;
use Illuminate\Support\Str;

use Yajra\DataTables\Facades\DataTables;

class CourseCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CourseCategory::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        return '<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Active</span>';
                    }
                    return '<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">Inactive</span>';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="flex items-center justify-end gap-2">
                                <a href="' . route('admin.course-categories.edit', $row->id) . '" class="text-blue-500 hover:bg-blue-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="' . route('admin.course-categories.destroy', $row->id) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this category?\');" class="inline">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="text-red-500 hover:bg-red-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.course_categories.index');
    }

    public function create()
    {
        return view('backend.course_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();
        $data['slug'] = create_slug(CourseCategory::class, $request->name);

        CourseCategory::create($data);

        return redirect()->route('admin.course-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(string $id)
    {
        $category = CourseCategory::findOrFail($id);
        return view('backend.course_categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = CourseCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();
        if ($request->name !== $category->name) {
            $data['slug'] = create_slug(CourseCategory::class, $request->name, $category->id);
        }

        $category->update($data);

        return redirect()->route('admin.course-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $id)
    {
        $category = CourseCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.course-categories.index')->with('success', 'Category deleted successfully.');
    }
}
