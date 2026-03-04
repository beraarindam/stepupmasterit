<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

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
