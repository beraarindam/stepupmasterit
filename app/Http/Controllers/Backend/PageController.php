<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    // ─────────────────────────────────────────────
    //  HOME PAGE
    // ─────────────────────────────────────────────
    public function home()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('backend.pages.home', compact('settings'));
    }

    public function homeUpdate(Request $request)
    {
        $fileFields = ['home_about_image'];

        $data = $request->except(array_merge(['_token'], $fileFields));

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Handle image upload
        if ($request->hasFile('home_about_image')) {
            $file = $request->file('home_about_image');
            $filename = time() . '_about.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            Setting::updateOrCreate(
                ['key' => 'home_about_image'],
                ['value' => 'uploads/settings/' . $filename]
            );
        }

        Cache::forget('site_settings');

        return redirect()->back()->with('success', 'Home page settings saved successfully!');
    }

    // ─────────────────────────────────────────────
    //  ABOUT US PAGE
    // ─────────────────────────────────────────────
    public function about()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('backend.pages.about', compact('settings'));
    }

    public function aboutUpdate(Request $request)
    {
        $fileFields = ['about_banner_image'];
        $exclude = array_merge(['_token', 'about_values_items'], $fileFields);

        $data = $request->except($exclude);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        $rows = $request->input('about_values_items', []);
        if (! is_array($rows)) {
            $rows = [];
        }
        $clean = [];
        foreach ($rows as $row) {
            if (! is_array($row)) {
                continue;
            }
            $title = trim((string) ($row['title'] ?? ''));
            $desc = trim((string) ($row['description'] ?? ''));
            if ($title === '' && $desc === '') {
                continue;
            }
            $clean[] = ['title' => $title, 'description' => $desc];
        }
        Setting::updateOrCreate(
            ['key' => 'about_values_items'],
            ['value' => json_encode($clean, JSON_UNESCAPED_UNICODE)]
        );

        if ($request->hasFile('about_banner_image')) {
            $file = $request->file('about_banner_image');
            $filename = time() . '_about_banner.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            Setting::updateOrCreate(
                ['key' => 'about_banner_image'],
                ['value' => 'uploads/settings/' . $filename]
            );
        }

        Cache::forget('site_settings');

        return redirect()->back()->with('success', 'About Us page settings saved successfully!');
    }

    // ─────────────────────────────────────────────
    //  GENERIC PAGE HANDLER
    // ─────────────────────────────────────────────
    public function index($page)
    {
        if (!view()->exists("backend.pages.$page")) {
            abort(404);
        }
        $settings = Setting::all()->pluck('value', 'key');
        return view("backend.pages.$page", compact('settings'));
    }

    public function update(Request $request, $page)
    {
        $fileFields = [$page . '_banner_image'];

        $data = $request->except(array_merge(['_token'], $fileFields));

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        if ($request->hasFile($page . '_banner_image')) {
            $file = $request->file($page . '_banner_image');
            $filename = time() . "_{$page}_banner." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            Setting::updateOrCreate(
                ['key' => $page . '_banner_image'],
                ['value' => 'uploads/settings/' . $filename]
            );
        }

        Cache::forget('site_settings');

        return redirect()->back()->with('success', ucfirst($page) . ' page settings saved successfully!');
    }
}
