@extends('backend.layouts.app')
@section('title', 'Add Course Category')
@section('breadcrumb', 'Admin / Course Categories / Create')
@section('content')
    <div class="space-y-6 animate-fade-in-up">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Add New Category 📚</h2>
                <p class="text-gray-500 mt-1">Create a new category for the courses.</p>
            </div>
            <div>
                <a href="{{ route('admin.course-categories.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2 px-4 rounded-lg transition-colors duration-200 flex items-center shadow-sm">
                    <i class="fas fa-arrow-left mr-2 font-normal"></i> Back to List
                </a>
            </div>
        </div>

        @if($errors->any())
            <div class="bg-red-50 text-red-600 p-4 rounded-lg flex flex-col shadow-sm border border-red-100">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center mb-1"><i class="fas fa-exclamation-circle mr-2"></i> {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.course-categories.store') }}" method="POST" class="p-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Graphic Design"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none transition-all"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none transition-all">
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <button type="submit"
                        class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-10 rounded-lg shadow-md transition-all duration-200 flex items-center hover:scale-105">
                        <i class="fas fa-save mr-2"></i> Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.5s ease-out forwards;
        }
    </style>
@endsection