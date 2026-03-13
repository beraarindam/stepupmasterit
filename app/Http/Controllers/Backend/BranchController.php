<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Branch::orderBy('sort_order')->orderBy('name')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('address', function ($row) {
                    return $row->address ? \Str::limit($row->address, 40) : '—';
                })
                ->addColumn('phone', function ($row) {
                    return $row->phone ?: '—';
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        return '<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Active</span>';
                    }
                    return '<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">Inactive</span>';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="flex items-center justify-end gap-2">
                                <a href="' . route('admin.branches.edit', $row->id) . '" class="text-blue-500 hover:bg-blue-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="' . route('admin.branches.destroy', $row->id) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this branch?\');" class="inline">
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

        return view('backend.branches.index');
    }

    public function create()
    {
        return view('backend.branches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'nullable',
            'phone' => 'nullable|max:50',
            'email' => 'nullable|email|max:255',
            'opening_hours' => 'nullable',
            'map_embed' => 'nullable',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();
        $data['sort_order'] = $request->sort_order ?? 0;

        Branch::create($data);

        return redirect()->route('admin.branches.index')->with('success', 'Branch created successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.branches.edit', $id);
    }

    public function edit(string $id)
    {
        $branch = Branch::findOrFail($id);
        return view('backend.branches.edit', compact('branch'));
    }

    public function update(Request $request, string $id)
    {
        $branch = Branch::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'address' => 'nullable',
            'phone' => 'nullable|max:50',
            'email' => 'nullable|email|max:255',
            'opening_hours' => 'nullable',
            'map_embed' => 'nullable',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();
        $data['sort_order'] = $request->sort_order ?? 0;

        $branch->update($data);

        return redirect()->route('admin.branches.index')->with('success', 'Branch updated successfully.');
    }

    public function destroy(string $id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();

        return redirect()->route('admin.branches.index')->with('success', 'Branch deleted successfully.');
    }
}
