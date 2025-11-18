<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Company Information
            ['key' => 'site_name', 'value' => 'Capitol Passport', 'type' => 'text'],
            ['key' => 'site_title', 'value' => 'Capitol Passport - Fast & Reliable Passport Services', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => 'Your Trusted Partner for Expedited Passport Services', 'type' => 'text'],
            ['key' => 'company_owner', 'value' => 'Capitol Visa Services', 'type' => 'text'],
            ['key' => 'site_domain', 'value' => 'CapitolPassport.com', 'type' => 'text'],
            ['key' => 'legal_entity', 'value' => 'FN Ventures LLC', 'type' => 'text'],
            
            // Contact Information
            ['key' => 'contact_email', 'value' => 'support@capitolpassport.com', 'type' => 'email'],
            ['key' => 'contact_phone', 'value' => '888-743-4926', 'type' => 'phone'],
            ['key' => 'contact_address', 'value' => '800 Bonaventure Way, STE 146', 'type' => 'text'],
            ['key' => 'contact_city', 'value' => 'Sugar Land', 'type' => 'text'],
            ['key' => 'contact_state', 'value' => 'TX', 'type' => 'text'],
            ['key' => 'contact_zip', 'value' => '77479', 'type' => 'text'],
            ['key' => 'contact_country', 'value' => 'United States', 'type' => 'text'],
            
            // Social Media
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/capitolpassport', 'type' => 'url'],
            ['key' => 'social_twitter', 'value' => 'https://twitter.com/capitolpassport', 'type' => 'url'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/capitolpassport', 'type' => 'url'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/capitol-visa-services', 'type' => 'url'],
            
            // Business Hours
            ['key' => 'business_hours', 'value' => 'Monday - Friday: 8:00 AM - 8:00 PM EST<br>Saturday: 9:00 AM - 5:00 PM EST<br>Sunday: Closed', 'type' => 'text'],
            
            // About
            ['key' => 'about_company', 'value' => 'Capitol Passport is owned and operated by Capitol Visa Services, a trusted third-party registered courier with the U.S. Department of State. We specialize in expediting passport applications and renewals, making the process quick, easy, and stress-free for our clients.', 'type' => 'text'],
            
            // Footer - Ownership & Disclaimer
            ['key' => 'footer_ownership', 'value' => 'CapitolPassport.com is owned and operated by Capitol Visa Services.', 'type' => 'text'],
            ['key' => 'footer_disclaimer', 'value' => 'Capitol Visa Services is a third-party registered courier with the U.S. Department of State. We are not a government agency and are not affiliated with any government authority.', 'type' => 'text'],
            ['key' => 'footer_text', 'value' => 'Expediting passport services with expertise and dedication to help you travel the world with confidence.', 'type' => 'text'],
            ['key' => 'copyright_text', 'value' => '© 2025 Capitol Visa Services. All Rights Reserved.', 'type' => 'text'],
            ['key' => 'developer_credit', 'value' => 'Designed by Skytronixs Developer Teams', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'type' => $setting['type']]
            );
        }
    }
}
