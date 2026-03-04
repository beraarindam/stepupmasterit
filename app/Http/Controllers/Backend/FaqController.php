<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->get();
        return view('backend.faqs.index', compact('faqs'));
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
