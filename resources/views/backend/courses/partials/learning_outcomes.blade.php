@php
    $rows = $items ?? [''];
    if (! is_array($rows) || count($rows) === 0) {
        $rows = [''];
    }
    $learningOutcomeItems = [];
    foreach ($rows as $row) {
        $learningOutcomeItems[] = [
            'text' => is_array($row) ? (string) ($row['text'] ?? '') : (string) $row,
        ];
    }
    $learningOutcomesJs = \Illuminate\Support\Js::from($learningOutcomeItems);
@endphp

@once
<script>
    document.addEventListener('alpine:init', function() {
        Alpine.data('courseLearningOutcomes', function(initialItems) {
            var items = Array.isArray(initialItems) && initialItems.length
                ? initialItems.map(function(row) {
                    return { text: row && row.text != null ? String(row.text) : '' };
                })
                : [{ text: '' }];
            return {
                items: items,
                addRow: function() {
                    this.items.push({ text: '' });
                },
                removeRow: function(i) {
                    if (this.items.length > 1) {
                        this.items.splice(i, 1);
                    }
                },
            };
        });
    });
</script>
@endonce

<div class="mt-8 pt-6 border-t border-gray-100" x-data="courseLearningOutcomes({{ $learningOutcomesJs }})">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
        <div>
            <h4 class="text-md font-semibold text-gray-800">What you'll achieve</h4>
            <p class="text-xs text-gray-500 mt-1">Shown on the Curriculum tab. Add one outcome per row.</p>
        </div>
        <button type="button" x-on:click="addRow()"
            class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg bg-indigo-50 text-indigo-700 text-sm font-semibold border border-indigo-100 hover:bg-indigo-100 transition">
            <i class="fas fa-plus"></i> Add outcome
        </button>
    </div>

    <div class="space-y-3">
        <template x-for="(item, index) in items" x-bind:key="index">
            <div class="flex gap-3 items-center">
                <span class="text-gray-400 text-sm w-6 shrink-0" x-text="index + 1"></span>
                <input type="text" x-bind:name="'learning_outcomes[' + index + '][text]'" x-model="item.text"
                    class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none text-sm"
                    placeholder="e.g. Master core industry concepts & tools">
                <button type="button" x-on:click="removeRow(index)" x-bind:disabled="items.length <= 1"
                    class="shrink-0 px-3 py-2 text-sm font-medium text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg border border-transparent hover:border-red-100 transition disabled:opacity-40 disabled:cursor-not-allowed"
                    title="Remove this outcome">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </template>
    </div>
</div>
