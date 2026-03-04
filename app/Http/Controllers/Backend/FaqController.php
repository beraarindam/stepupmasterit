<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Faq;

use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Faq::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('question', function ($row) {
                    return $row->question;
                })
                ->addColumn('answer', function ($row) {
                    return \Illuminate\Support\Str::limit(strip_tags($row->answer), 50);
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        return '<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Active</span>';
                    }
                    return '<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">Inactive</span>';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="flex items-center justify-end gap-2">
                                <a href="' . route('admin.faqs.edit', $row->id) . '" class="text-blue-500 hover:bg-blue-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="' . route('admin.faqs.destroy', $row->id) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this FAQ?\');" class="inline">
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

        return view('backend.faqs.index');
    }

    public function create()
    {
        return view('backend.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        Faq::create($request->all());

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.faqs.edit', $id);
    }

    public function edit(string $id)
    {
        $faq = Faq::findOrFail($id);
        return view('backend.faqs.edit', compact('faq'));
    }

    public function update(Request $request, string $id)
    {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        $faq->update($request->all());

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(string $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
