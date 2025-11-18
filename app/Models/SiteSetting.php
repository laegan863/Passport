<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value', 'type'];

    /**
     * Get a setting value by key
     */
    public static function get(string $key, $default = null)
    {
        return Cache::remember("site_setting_{$key}", 3600, function () use ($key, $default) {
            $setting = self::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    /**
     * Set a setting value
     */
    public static function set(string $key, $value, string $type = 'text')
    {
        $setting = self::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'type' => $type]
        );
        
        // Clear individual setting cache
        Cache::forget("site_setting_{$key}");
        
        // Clear all settings cache
        Cache::forget('all_site_settings');
        
        return $setting;
    }

    /**
     * Get all settings as an array
     */
    public static function getAllSettings()
    {
        return Cache::remember('all_site_settings', 3600, function () {
            return self::all()->pluck('value', 'key')->toArray();
        });
    }
}
