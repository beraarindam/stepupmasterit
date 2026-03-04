@extends('backend.layouts.app')
@section('title', "Edit Faq")
@section('breadcrumb', "Admin / Faqs / Edit")
@section('content')
<div class="space-y-6 animate-fade-in-up">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Edit Faq <i class="fas fa-question-circle"></i></h2>
        </div>
        <div>
            <a href="{{ route('admin.faqs.index') }}" class="text-gray-500 hover:text-gray-700 font-medium transition-colors flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Back to list
            </a>
        </div>
    </div>
    @if ($errors->any())
        <div class="bg-red-50 text-red-500 p-4 rounded-lg text-sm border border-red-100">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1 capitalize">question</label>
                        <input type="text" name="question" value="{{ old('question', $faq->question) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                    </div>                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1 capitalize">answer</label>
                        <textarea name="answer" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ old('answer', $faq->answer) }}</textarea>
                    </div>                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            <option value="active" {{ (old('status', $faq->status) == 'active') ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ (old('status', $faq->status) == 'inactive') ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div>                </div>
            </div>
            <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                <button type="submit" class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-lg shadow-sm transition-colors flex items-center">
                    <i class="fas fa-save mr-2"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection