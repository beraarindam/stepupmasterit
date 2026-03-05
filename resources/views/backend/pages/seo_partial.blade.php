<!-- SEO Management Section -->
<div class="mb-8">
    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
        🔍 SEO Management
    </h4>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
                <input type="text" name="{{ $page }}_meta_title" value="{{ $settings[$page . '_meta_title'] ?? '' }}"
                    placeholder="Enter meta title for better ranking..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Meta Keywords</label>
                <input type="text" name="{{ $page }}_meta_keywords"
                    value="{{ $settings[$page . '_meta_keywords'] ?? '' }}"
                    placeholder="keyword1, keyword2, keyword3..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
            </div>
        </div>
        <div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
                <textarea name="{{ $page }}_meta_description" rows="5"
                    placeholder="Enter a brief, engaging summary of the page for search results..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ $settings[$page . '_meta_description'] ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>