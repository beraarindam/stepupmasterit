@php
    $selectedCampusIds = old('campus_ids', $selectedCampusIds ?? []);
    if (! is_array($selectedCampusIds)) {
        $selectedCampusIds = [];
    }
    $selectedCampusIds = array_map('intval', $selectedCampusIds);
@endphp

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">Campuses</label>
    @if($campuses->isEmpty())
        <p class="text-sm text-gray-500 rounded-lg border border-dashed border-gray-300 p-3">
            No campuses available.
            <a href="{{ route('admin.campuses.create') }}" class="text-primary font-medium hover:underline">Add a campus</a>
            first.
        </p>
    @else
        <div class="border border-gray-300 rounded-lg p-3 max-h-44 overflow-y-auto bg-gray-50/50 space-y-2">
            @foreach($campuses as $campus)
                <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                    <input type="checkbox" name="campus_ids[]" value="{{ $campus->id }}"
                        class="rounded border-gray-300 text-primary focus:ring-primary"
                        {{ in_array((int) $campus->id, $selectedCampusIds, true) ? 'checked' : '' }}>
                    <span>{{ $campus->title }}</span>
                </label>
            @endforeach
        </div>
        <p class="text-xs text-gray-500 mt-1">Select one or more campuses from your campus list.</p>
    @endif
</div>
