@extends('backend.layouts.app')

@section('title', 'Contact Us Page Management')
@section('breadcrumb', 'Admin / Page Management / Contact Us')

@section('content')
    <div class="space-y-6 animate-fade-in-up">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Contact Us Page Settings 📞</h2>
                <p class="text-gray-500 mt-1">Manage all the content specifically for your Contact Us page.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-600 p-4 rounded-lg flex items-center shadow-sm">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.pages.update', 'contact') }}" method="POST" enctype="multipart/form-data"
                class="p-6">
                @csrf

                <!-- Banner Section -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        🚩 Banner Section
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Heading</label>
                                <input type="text" name="contact_banner_heading"
                                    value="{{ $settings['contact_banner_heading'] ?? 'Contact Us' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Sub-heading</label>
                                <input type="text" name="contact_banner_subheading"
                                    value="{{ $settings['contact_banner_subheading'] ?? 'Have a question? We are here to help you.' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Image</label>
                                @if(isset($settings['contact_banner_image']) && !empty($settings['contact_banner_image']))
                                    <div class="mb-2 p-2 bg-gray-50 border rounded-lg inline-block">
                                        <img src="{{ asset($settings['contact_banner_image']) }}" alt="Contact Banner"
                                            class="h-24 object-contain">
                                    </div>
                                @endif
                                <input type="file" name="contact_banner_image" accept="image/*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                                <p class="text-xs text-gray-500 mt-1">Recommended size: 1920x400px</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Info Section -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        📍 Contact Information
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Primary Email</label>
                                <input type="email" name="contact_email"
                                    value="{{ $settings['contact_email'] ?? 'contact@stepupmasterit.com' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Primary Phone</label>
                                <input type="text" name="contact_phone"
                                    value="{{ $settings['contact_phone'] ?? '+1 234 567 8900' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Physical Address</label>
                                <textarea name="contact_address" rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ $settings['contact_address'] ?? '123 Education Street, Learning City' }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Opening Hours</label>
                                <input type="text" name="contact_opening_hours"
                                    value="{{ $settings['contact_opening_hours'] ?? 'Mon - Fri: 9:00 AM - 6:00 PM' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Google Map Embed Link (Iframe
                            SRC)</label>
                        <textarea name="contact_map_iframe" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none"
                            placeholder="https://www.google.com/maps/embed?pb=...">{{ $settings['contact_map_iframe'] ?? '' }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Paste ONLY the 'src' value from the Google Maps embed code.
                        </p>
                    </div>
                </div>

                <!-- SEO Section -->
                @include('backend.pages.seo_partial', ['page' => 'contact'])

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                        class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-10 rounded-lg shadow-md transition-all duration-200 flex items-center hover:scale-105">
                        <i class="fas fa-save mr-2"></i> Update Contact Page Content
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
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>
@endsection