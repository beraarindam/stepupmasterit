@extends('backend.layouts.app')
@section('title', "Edit Banner")
@section('breadcrumb', "Admin / Banners / Edit")
@section('content')
<div class="space-y-6 animate-fade-in-up">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Edit Banner <i class="fas fa-image"></i></h2>
        </div>
        <div>
            <a href="{{ route('admin.banners.index') }}" class="text-gray-500 hover:text-gray-700 font-medium transition-colors flex items-center">
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
        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1 capitalize">Title</label>
                        <input type="text" name="title" value="{{ old('title', $banner->title) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1 capitalize">Subtitle</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle', $banner->subtitle) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1 capitalize">Link URL</label>
                        <input type="text" name="link" value="{{ old('link', $banner->link) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1 capitalize">Button Text</label>
                        <input type="text" name="button_text" value="{{ old('button_text', $banner->button_text) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            <option value="active" {{ (old('status', $banner->status) == 'active') ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ (old('status', $banner->status) == 'inactive') ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Banner Image</label>
                        @if($banner->image)
                            <div class="mb-2 p-2 bg-gray-50 border rounded-lg inline-block">
                                <img src="{{ asset($banner->image) }}" class="h-20 object-cover rounded">
                            </div>
                        @endif
                        <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                        <p class="text-xs text-gray-500 mt-1">Leave blank to keep existing image</p>
                    </div>
                </div>
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