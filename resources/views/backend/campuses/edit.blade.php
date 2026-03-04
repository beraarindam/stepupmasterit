@extends('backend.layouts.app')
@section('title', "Edit Campus")
@section('breadcrumb', "Admin / Campuses / Edit")
@section('content')
    <div class="space-y-6 animate-fade-in-up">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Edit Campus <i class="fas fa-building"></i></h2>
            </div>
            <div>
                <a href="{{ route('admin.campuses.index') }}"
                    class="text-gray-500 hover:text-gray-700 font-medium transition-colors flex items-center">
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
            <form action="{{ route('admin.campuses.update', $campus->id) }}" method="POST" enctype="multipart/form-data"
                class="p-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1 capitalize">title</label>
                            <input type="text" name="title" value="{{ old('title', $campus->title) }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1 capitalize">short_description</label>
                            <textarea name="short_description" rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ old('short_description', $campus->short_description) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                                <option value="active" {{ (old('status', $campus->status) == 'active') ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive" {{ (old('status', $campus->status) == 'inactive') ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Detailed Description</label>
                            <textarea name="description" rows="9"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ old('description', $campus->description) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Image Thumbnail</label>
                            @if($campus->image)
                                <div class="mb-4 relative group inline-block">
                                    <img src="{{ asset($campus->image) }}"
                                        class="h-32 w-auto object-cover rounded-lg border border-gray-200 shadow-sm">
                                    <div
                                        class="absolute inset-0 bg-black/40 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <span class="text-white text-xs font-medium px-2 py-1 bg-black/50 rounded-md">Current
                                            Image</span>
                                    </div>
                                </div>
                            @endif
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50/50 hover:bg-gray-50 transition-colors">
                                <div class="space-y-1 text-center">
                                    <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3"></i>
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <label
                                            class="relative cursor-pointer rounded-md font-medium text-primary hover:text-blue-500 focus-within:outline-none">
                                            <span>Upload a new file</span>
                                            <input type="file" name="image" accept="image/*" class="sr-only">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2">Leave blank to keep current image. PNG, JPG, GIF
                                        up to 2MB.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                        class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-lg shadow-sm transition-colors flex items-center">
                        <i class="fas fa-save mr-2"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection