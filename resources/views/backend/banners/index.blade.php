@extends('backend.layouts.app')
@section('title', "Manage Banners")
@section('breadcrumb', "Admin / Banners")
@section('content')
<div class="space-y-6 animate-fade-in-up">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Banners Management <i class="fas fa-image"></i></h2>
            <p class="text-gray-500 mt-1">Manage all the banners items.</p>
        </div>
        <div>
            <a href="{{ route('admin.banners.create') }}" class="bg-primary hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-sm transition-colors duration-200 flex items-center">
                <i class="fas fa-plus mr-2"></i> Add New
            </a>
        </div>
    </div>
    @if(session('success'))
        <div class="bg-green-50 text-green-600 p-4 rounded-lg flex items-center shadow-sm border border-green-100">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-medium">Image</th>
                        <th class="px-6 py-4 font-medium capitalize">Title</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($banners as $item)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            @if($item->image)
                                <img src="{{ asset($item->image) }}" class="w-12 h-10 object-cover rounded-lg border">
                            @else
                                <div class="w-12 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-800">{{ Str::limit($item->title ?? 'No Title', 50) }}</td>
                        <td class="px-6 py-4">
                            @if($item->status == 'active')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Active</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.banners.edit', $item->id) }}" class="text-blue-500 hover:bg-blue-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.banners.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:bg-red-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            No items found. <a href="{{ route('admin.banners.create') }}" class="text-primary hover:underline">Add your first item.</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade-in-up { animation: fadeInUp 0.5s ease-out forwards; }
</style>
@endsection