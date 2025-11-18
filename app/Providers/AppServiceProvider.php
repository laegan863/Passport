<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SiteSetting;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share site settings with all views
        try {
            $settings = SiteSetting::getAllSettings();
            View::share('siteSettings', $settings);
            Paginator::useBootstrapFive();
            Paginator::useBootstrapFour();
            
            // Also share individual settings for easier access
            View::share('siteName', $settings['site_name'] ?? 'IVS');
            View::share('siteTitle', $settings['site_title'] ?? 'IVS - International Visa Services');
            View::share('contactEmail', $settings['contact_email'] ?? 'support@ivs-passport.com');
            View::share('contactPhone', $settings['contact_phone'] ?? '+1 (555) 123-4567');
            View::share('contactAddress', $settings['contact_address'] ?? '1234 Embassy Boulevard');
        } catch (\Exception $e) {
            // In case database is not yet migrated
            View::share('siteName', 'IVS');
            View::share('siteTitle', 'IVS - International Visa Services');
            View::share('contactEmail', 'support@ivs-passport.com');
            View::share('contactPhone', '+1 (555) 123-4567');
            View::share('contactAddress', '1234 Embassy Boulevard');
        }
    }
}
