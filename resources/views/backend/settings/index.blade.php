@extends('backend.layouts.app')

@section('title', 'Global Settings')
@section('breadcrumb', 'Admin / Settings')

@section('content')
    <div class="space-y-6 animate-fade-in-up">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Site Settings ⚙️</h2>
                <p class="text-gray-500 mt-1">Manage global configurations across the website including contact details and
                    social links.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-600 p-4 rounded-lg flex items-center shadow-sm">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- General Section -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4"><i
                                class="fas fa-globe text-primary mr-2"></i> General Info</h3>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Site Title / Name</label>
                            <input type="text" name="site_title" value="{{ $settings['site_title'] ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Site Logo</label>
                            @if(isset($settings['site_logo']) && !empty($settings['site_logo']))
                                <div class="mb-2 p-2 bg-gray-50 border rounded-lg inline-block text-center">
                                    <img src="{{ asset($settings['site_logo']) }}" alt="Current Logo"
                                        class="h-12 object-contain">
                                    <p class="text-[10px] text-gray-400 mt-1">Logo</p>
                                </div>
                            @endif
                            <input type="file" name="site_logo" accept="image/*"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            <p class="text-xs text-gray-500 mt-1">Leave blank to keep current logo.</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Site Favicon</label>
                            @if(isset($settings['site_favicon']) && !empty($settings['site_favicon']))
                                <div class="mb-2 p-2 bg-gray-50 border rounded-lg inline-block text-center">
                                    <img src="{{ asset($settings['site_favicon']) }}" alt="Current Favicon"
                                        class="h-8 object-contain">
                                    <p class="text-[10px] text-gray-400 mt-1">Favicon</p>
                                </div>
                            @endif
                            <input type="file" name="site_favicon" accept="image/*"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            <p class="text-xs text-gray-500 mt-1">Small square icon (usual 32x32 or 16x16).</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Short Description / Tagline</label>
                            <textarea name="site_description" rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ $settings['site_description'] ?? '' }}</textarea>
                        </div>
                    </div>

                    <!-- Contact Section -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4"><i
                                class="fas fa-address-book text-primary mr-2"></i> Contact Details</h3>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Contact Email</label>
                            <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Contact Phone Number</label>
                            <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Office Address</label>
                            <textarea name="contact_address" rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ $settings['contact_address'] ?? '' }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Google Maps Embed URL</label>
                            <textarea name="map_url" rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none"
                                placeholder="Paste the src attribute URL from Google Maps Embed feature">{{ $settings['map_url'] ?? '' }}</textarea>
                            <p class="text-xs text-gray-500 mt-1">Just the URL (src="..." link), not the entire iframe tag.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Social Media Section -->
                <div class="mt-8">
                    <h3 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4"><i
                            class="fas fa-hashtag text-primary mr-2"></i> Social Links</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1"><i
                                    class="fab fa-facebook text-blue-600 mr-1"></i> Facebook URL</label>
                            <input type="url" name="facebook_url" value="{{ $settings['facebook_url'] ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none"
                                placeholder="https://facebook.com/yourpage">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1"><i
                                    class="fab fa-twitter text-blue-400 mr-1"></i> Twitter / X URL</label>
                            <input type="url" name="twitter_url" value="{{ $settings['twitter_url'] ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none"
                                placeholder="https://twitter.com/yourhandle">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1"><i
                                    class="fab fa-instagram text-pink-600 mr-1"></i> Instagram URL</label>
                            <input type="url" name="instagram_url" value="{{ $settings['instagram_url'] ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none"
                                placeholder="https://instagram.com/yourhandle">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1"><i
                                    class="fab fa-linkedin text-blue-700 mr-1"></i> LinkedIn URL</label>
                            <input type="url" name="linkedin_url" value="{{ $settings['linkedin_url'] ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none"
                                placeholder="https://linkedin.com/company/yourpage">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1"><i
                                    class="fab fa-youtube text-red-600 mr-1"></i> YouTube URL</label>
                            <input type="url" name="youtube_url" value="{{ $settings['youtube_url'] ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none"
                                placeholder="https://youtube.com/@yourchannel">
                        </div>
                    </div>
                </div>


                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                        class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-lg shadow-sm transition-colors duration-200 flex items-center">
                        <i class="fas fa-save mr-2"></i> Save Settings
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
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