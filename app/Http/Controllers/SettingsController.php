<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    /**
     * Show the settings management page
     */
    public function index()
    {
        return view('admin.settings');
    }

    /**
     * Update site settings
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_title' => 'required|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:50',
            'contact_address' => 'nullable|string|max:500',
            'contact_city' => 'nullable|string|max:100',
            'contact_state' => 'nullable|string|max:100',
            'contact_zip' => 'nullable|string|max:20',
            'social_facebook' => 'nullable|url|max:500',
            'social_twitter' => 'nullable|url|max:500',
            'social_instagram' => 'nullable|url|max:500',
            'social_linkedin' => 'nullable|url|max:500',
            'footer_text' => 'nullable|string|max:1000',
            'copyright_text' => 'nullable|string|max:500',
        ]);

        foreach ($validated as $key => $value) {
            if ($value !== null) {
                SiteSetting::set($key, $value);
            }
        }

        // Cache is automatically cleared by SiteSetting::set() method
        return redirect()->route('admin.settings')
            ->with('success', 'Settings updated successfully!');
    }
}
