<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

if (!function_exists('get_setting')) {
    /**
     * Get setting value by key.
     *
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    function get_setting($key, $default = null)
    {
        // Cache settings to avoid frequent database queries
        $settings = Cache::rememberForever('site_settings', function () {
            return Setting::pluck('value', 'key')->toArray();
        });

        return $settings[$key] ?? $default;
    }
}

if (!function_exists('get_logo')) {
    /**
     * Get site logo URL.
     *
     * @return string
     */
    function get_logo()
    {
        $logo = get_setting('site_logo');
        if ($logo && file_exists(public_path($logo))) {
            return asset($logo);
        }
        return asset('images/logo.png'); // Fallback logo
    }
}

if (!function_exists('get_setting_image')) {
    /**
     * Get setting image URL.
     *
     * @param string $key
     * @param string|null $default_path
     * @return string
     */
    function get_setting_image($key, $default_path = null)
    {
        $image = get_setting($key);
        if ($image && file_exists(public_path($image))) {
            return asset($image);
        }
        return $default_path ? asset($default_path) : '';
    }
}

if (!function_exists('format_course_fee')) {
    /**
     * Format course fee for display (fee is stored as text in admin).
     */
    function format_course_fee($fee, string $currency = '₹', string $fallback = 'TBD'): string
    {
        if ($fee === null || $fee === '') {
            return $fallback;
        }

        if (is_int($fee) || is_float($fee)) {
            return $currency . number_format($fee);
        }

        $feeStr = trim((string) $fee);
        if ($feeStr === '') {
            return $fallback;
        }

        $numeric = preg_replace('/[^\d.]/', '', $feeStr);
        if ($numeric !== '' && is_numeric($numeric)) {
            return $currency . number_format((float) $numeric);
        }

        return $feeStr;
    }
}

if (!function_exists('render_rich_content')) {
    /**
     * Output CKEditor HTML or legacy plain text (with line breaks).
     */
    function render_rich_content(?string $content): string
    {
        if ($content === null || trim($content) === '') {
            return '';
        }

        $content = trim($content);
        if ($content === strip_tags($content)) {
            return nl2br(e($content));
        }

        return $content;
    }
}

if (!function_exists('rich_text_excerpt')) {
    /**
     * Plain-text excerpt for cards/listings (strips HTML from CKEditor content).
     */
    function rich_text_excerpt(?string $content, int $limit = 100): string
    {
        if ($content === null || trim($content) === '') {
            return '';
        }

        return Str::limit(trim(strip_tags($content)), $limit);
    }
}

if (!function_exists('get_course_learning_outcomes')) {
    /**
     * Learning outcomes for the course Curriculum tab.
     *
     * @return array<int, string>
     */
    function get_course_learning_outcomes($course): array
    {
        static $fallback = null;
        if ($fallback === null) {
            $fallback = [
                'Master core industry concepts & tools',
                'Hands-on project experience with experts',
                'Global certification readiness & support',
                'Career guidance and placement assistance',
            ];
        }

        $raw = $course->learning_outcomes ?? null;
        if (is_string($raw) && $raw !== '') {
            $decoded = json_decode($raw, true);
            $raw = is_array($decoded) ? $decoded : null;
        }

        if (is_array($raw) && count($raw) > 0) {
            $out = [];
            foreach ($raw as $item) {
                $text = is_array($item) ? trim((string) ($item['text'] ?? '')) : trim((string) $item);
                if ($text !== '') {
                    $out[] = $text;
                }
            }
            if (count($out) > 0) {
                return $out;
            }
        }

        return $fallback;
    }
}

if (!function_exists('get_about_core_values')) {
    /**
     * Core values for the About page (admin JSON, legacy textarea, or defaults).
     *
     * @return array<int, array{title: string, description: string}>
     */
    function get_about_core_values(): array
    {
        static $fallback = null;
        if ($fallback === null) {
            $fallback = [
                ['title' => 'Excellence', 'description' => 'We strive for the highest standards in everything we do.'],
                ['title' => 'Inclusivity', 'description' => 'Education for all, regardless of background or status.'],
                ['title' => 'Innovation', 'description' => 'Embracing new technologies to enhance learning.'],
                ['title' => 'Passion', 'description' => 'We are dedicated to your success and growth.'],
            ];
        }

        $json = get_setting('about_values_items');
        if (is_string($json) && $json !== '') {
            $decoded = json_decode($json, true);
            if (is_array($decoded) && count($decoded) > 0) {
                $out = [];
                foreach ($decoded as $row) {
                    if (! is_array($row)) {
                        continue;
                    }
                    $title = trim((string) ($row['title'] ?? ''));
                    $desc = trim((string) ($row['description'] ?? ''));
                    if ($title === '' && $desc === '') {
                        continue;
                    }
                    $out[] = ['title' => $title, 'description' => $desc];
                }
                if (count($out) > 0) {
                    return $out;
                }
            }
        }

        $legacy = get_setting('about_values_list');
        if (is_string($legacy) && $legacy !== '') {
            $out = [];
            foreach (preg_split("/\r\n|\n|\r/", $legacy) as $line) {
                $line = trim($line);
                if ($line === '') {
                    continue;
                }
                $parts = explode('|', $line, 2);
                $out[] = [
                    'title' => trim($parts[0] ?? ''),
                    'description' => trim($parts[1] ?? ''),
                ];
            }
            if (count($out) > 0) {
                return $out;
            }
        }

        return $fallback;
    }
}

if (!function_exists('create_slug')) {
    /**
     * Create a unique slug for a model.
     *
     * @param string $model_class
     * @param string $title
     * @param int $id
     * @return string
     */
    function create_slug($model_class, $title, $id = 0)
    {
        $slug = Str::slug($title);
        $allSlugs = $model_class::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();

        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        $i = 1;
        while ($allSlugs->contains('slug', $slug . '-' . $i)) {
            $i++;
        }

        return $slug . '-' . $i;
    }
}

if (!function_exists('normalize_map_embed_url')) {
    /**
     * Normalize Google Maps embed value (plain URL or full iframe HTML).
     */
    function normalize_map_embed_url($value): ?string
    {
        if ($value === null) {
            return null;
        }

        $value = trim((string) $value);
        if ($value === '') {
            return null;
        }

        if (preg_match('/src=["\']([^"\']+)["\']/i', $value, $matches)) {
            return trim($matches[1]);
        }

        return $value;
    }
}

if (!function_exists('get_contact_map_url')) {
    /**
     * Resolve the contact page map embed URL from settings and branches.
     */
    function get_contact_map_url($branches = null): ?string
    {
        foreach (['map_url', 'contact_map_iframe'] as $key) {
            $url = normalize_map_embed_url(get_setting($key));
            if ($url) {
                return $url;
            }
        }

        if ($branches) {
            foreach ($branches as $branch) {
                $url = normalize_map_embed_url($branch->map_embed ?? null);
                if ($url) {
                    return $url;
                }
            }
        }

        return null;
    }
}

if (!function_exists('get_course_campus_ids')) {
    /**
     * Parse stored course campuses value into campus IDs (supports legacy comma-separated titles).
     *
     * @return int[]
     */
    function get_course_campus_ids(?string $value): array
    {
        if ($value === null || trim($value) === '') {
            return [];
        }

        $parts = array_values(array_filter(array_map('trim', explode(',', $value))));
        if ($parts === []) {
            return [];
        }

        if (collect($parts)->every(fn ($part) => ctype_digit($part))) {
            return array_map('intval', $parts);
        }

        $campuses = \App\Models\Campus::query()
            ->where('status', 'active')
            ->get(['id', 'title']);

        $ids = [];
        foreach ($parts as $part) {
            $match = $campuses->first(fn ($campus) => strcasecmp($campus->title, $part) === 0);
            if ($match) {
                $ids[] = (int) $match->id;
            }
        }

        return array_values(array_unique($ids));
    }
}

if (!function_exists('format_course_campuses')) {
    /**
     * Display course campuses as comma-separated campus titles.
     */
    function format_course_campuses(?string $value): string
    {
        if ($value === null || trim($value) === '') {
            return '';
        }

        $parts = array_values(array_filter(array_map('trim', explode(',', $value))));
        if ($parts === []) {
            return '';
        }

        if (collect($parts)->every(fn ($part) => ctype_digit($part))) {
            $titles = \App\Models\Campus::query()
                ->whereIn('id', array_map('intval', $parts))
                ->orderBy('title')
                ->pluck('title');

            if ($titles->isNotEmpty()) {
                return $titles->implode(', ');
            }
        }

        return $value;
    }
}
