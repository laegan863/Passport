# Quick Reference Guide - IVS Dynamic Settings

## Accessing Settings in Blade Templates

### Option 1: Individual Variables (Recommended)
```blade
{{ $siteName }}           // IVS
{{ $siteTitle }}          // IVS - International Visa Services
{{ $contactEmail }}       // support@ivs-passport.com
{{ $contactPhone }}       // +1 (555) 123-4567
{{ $contactAddress }}     // 1234 Embassy Boulevard, Suite 500
```

### Option 2: Settings Array
```blade
{{ $siteSettings['site_name'] ?? 'Default Value' }}
{{ $siteSettings['contact_email'] ?? 'default@example.com' }}
{{ $siteSettings['social_facebook'] ?? '#' }}
```

## Available Settings

| Key | Value | Usage |
|-----|-------|-------|
| `site_name` | IVS | Company name |
| `site_title` | IVS - International Visa Services | Page title |
| `site_tagline` | Your Trusted Partner for Passport Services | Tagline |
| `contact_email` | support@ivs-passport.com | Contact email |
| `contact_phone` | +1 (555) 123-4567 | Contact phone |
| `contact_address` | 1234 Embassy Boulevard, Suite 500 | Street address |
| `contact_city` | Washington | City |
| `contact_state` | DC | State |
| `contact_zip` | 20001 | Zip code |
| `contact_country` | United States | Country |
| `social_facebook` | https://facebook.com/ivs-passport | Facebook URL |
| `social_twitter` | https://twitter.com/ivs_passport | Twitter URL |
| `social_instagram` | https://instagram.com/ivs_passport | Instagram URL |
| `social_linkedin` | https://linkedin.com/company/ivs-passport | LinkedIn URL |
| `business_hours` | Monday - Friday: 8:00 AM - 8:00 PM EST... | Business hours HTML |
| `about_company` | IVS (International Visa Services) is... | About text |
| `footer_text` | Streamlining passport services... | Footer description |
| `copyright_text` | © 2025 IVS... | Copyright notice |
| `developer_credit` | Designed by Skytronixs Developer Teams | Developer credit |

## Managing Settings

### Using Tinker (Command Line)
```bash
# Start tinker
php artisan tinker

# Get a setting
SiteSetting::get('site_name');

# Set a setting
SiteSetting::set('contact_email', 'new@ivs.com', 'email');

# Get all settings
$all = SiteSetting::getAllSettings();
```

### Direct Database Update
```sql
UPDATE site_settings 
SET value = 'new value' 
WHERE key = 'site_name';
```

### In Controller
```php
use App\Models\SiteSetting;

// Get a setting
$email = SiteSetting::get('contact_email');

// Set a setting
SiteSetting::set('site_name', 'New Name', 'text');

// Get all
$settings = SiteSetting::getAllSettings();
```

## Cache Management

Settings are cached for 1 hour. To clear:
```bash
php artisan cache:clear
```

## Example Usage in Blade

### Email Link
```blade
<a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>
```

### Phone Link
```blade
<a href="tel:{{ $contactPhone }}">{{ $contactPhone }}</a>
```

### Social Media
```blade
<a href="{{ $siteSettings['social_facebook'] ?? '#' }}">
    <i class="bi bi-facebook"></i>
</a>
```

### Full Address
```blade
{{ $contactAddress }}<br>
{{ $siteSettings['contact_city'] }}, 
{{ $siteSettings['contact_state'] }} 
{{ $siteSettings['contact_zip'] }}
```

## Common Tasks

### Update Company Name
```bash
php artisan tinker
SiteSetting::set('site_name', 'New Company Name');
exit
php artisan cache:clear
```

### Update Contact Info
```bash
php artisan tinker
SiteSetting::set('contact_email', 'info@company.com', 'email');
SiteSetting::set('contact_phone', '+1 (555) 999-8888', 'phone');
exit
php artisan cache:clear
```

### Update Social Media
```bash
php artisan tinker
SiteSetting::set('social_facebook', 'https://facebook.com/newpage', 'url');
SiteSetting::set('social_twitter', 'https://twitter.com/newhandle', 'url');
exit
php artisan cache:clear
```

## Adding New Settings

### Via Seeder
1. Edit `database/seeders/SiteSettingSeeder.php`
2. Add your new setting to the array:
```php
['key' => 'new_setting', 'value' => 'value', 'type' => 'text'],
```
3. Run: `php artisan db:seed --class=SiteSettingSeeder`

### Via Tinker
```bash
php artisan tinker
SiteSetting::set('new_setting', 'new value', 'text');
exit
```

## Troubleshooting

### Settings not updating?
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Can't see new settings in blade?
1. Check if the setting exists in database
2. Clear all caches (see above)
3. Restart development server if using `php artisan serve`

### Database not migrated?
```bash
php artisan migrate
php artisan db:seed --class=SiteSettingSeeder
```

## Best Practices

1. **Always use fallbacks**: `{{ $siteName ?? 'Default' }}`
2. **Cache appropriately**: Settings are cached for performance
3. **Type your settings**: Use the 'type' field correctly (text, email, url, phone)
4. **Clear cache after updates**: Especially in production
5. **Backup before major changes**: Always backup `site_settings` table

## Need Help?

- Check `IMPLEMENTATION_SUMMARY.md` for detailed documentation
- Review `app/Models/SiteSetting.php` for available methods
- See `app/Providers/AppServiceProvider.php` for how settings are shared
