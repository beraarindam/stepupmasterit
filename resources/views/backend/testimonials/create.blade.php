@extends('backend.layouts.app')
@section('title', "Add New Testimonial")
@section('breadcrumb', "Admin / Testimonials / Create")
@section('content')
<div class="space-y-6 animate-fade-in-up">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Add New Testimonial <i class="fas fa-comment-dots"></i></h2>
        </div>
        <div>
            <a href="{{ route('admin.testimonials.index') }}" class="text-gray-500 hover:text-gray-700 font-medium transition-colors flex items-center">
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
        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1 capitalize">Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1 capitalize">Designation / Role</label>
                        <input type="text" name="designation" value="{{ old('designation') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Testimonial Message <span class="text-red-500">*</span></label>
                        <textarea name="message" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ old('message') }}</textarea>
                    </div>
                </div>
                <div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Profile Image</label>
                        <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                        <p class="text-xs text-gray-500 mt-1">Recommended size: 150x150px (Square)</p>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                <button type="submit" class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-lg shadow-sm transition-colors flex items-center">
                    <i class="fas fa-save mr-2"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection