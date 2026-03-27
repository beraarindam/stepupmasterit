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
