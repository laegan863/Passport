# Site Settings Management Guide

## 📌 Overview

Your IVS website uses a **database-driven settings system** that allows you to change the site name, contact information, and other details without editing code. All settings are stored in the `site_settings` database table and are automatically cached for performance.

---

## 🎯 How to Update Site Settings

### Method 1: Using the Settings Manager (Recommended)

1. **Access the Settings Page:**
   ```
   http://your-domain.com/admin/settings
   OR
   http://localhost:8000/admin/settings (for local development)
   ```

2. **Update Any Settings** such as:
   - Site Name (appears everywhere on your site)
   - Contact Email
   - Contact Phone
   - Address
   - Social Media Links
   - Footer Text
   - Copyright Text

3. **Click "Save All Settings"**
   - All settings will be saved to the database
   - Caches will be automatically cleared
   - Changes will appear immediately on your website

### Method 2: Using Database Directly (Advanced)

If you prefer to update settings directly in the database:

1. Open your database management tool (phpMyAdmin, MySQL Workbench, etc.)
2. Navigate to the `site_settings` table
3. Find the row with the setting you want to change (e.g., `site_name`)
4. Update the `value` column
5. **IMPORTANT: Clear the cache** by running:
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan view:clear
   ```

---

## 🔧 Why Your Changes Weren't Showing

When you changed the site name directly in the database, it wasn't reflecting on the website because:

### The Problem: **Cached Data**

- Laravel caches the site settings for 1 hour (3600 seconds) for performance
- When you change data in the database, the old values remain in the cache
- The website continues showing cached values until they expire or you manually clear the cache

### The Solution: **Clear All Caches**

After making any database changes, you must clear the cache:

```bash
cd c:\xampp\htdocs\Passport\Passport
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

OR use the Settings Manager page which automatically clears caches when you save.

---

## 📋 Available Site Settings

| Setting Key | Description | Example Value |
|-------------|-------------|---------------|
| `site_name` | Main site name (appears in header, footer, etc.) | `IVS` |
| `site_title` | Browser tab title | `IVS - International Visa Services` |
| `site_tagline` | Tagline or slogan | `Your Trusted Partner for Passport Services` |
| `contact_email` | Primary contact email | `support@ivs-passport.com` |
| `contact_phone` | Primary contact phone | `+1 (555) 123-4567` |
| `contact_address` | Street address | `1234 Embassy Boulevard, Suite 500` |
| `contact_city` | City | `Washington` |
| `contact_state` | State | `DC` |
| `contact_zip` | ZIP code | `20001` |
| `social_facebook` | Facebook page URL | `https://facebook.com/ivs-passport` |
| `social_twitter` | Twitter/X profile URL | `https://twitter.com/ivs_passport` |
| `social_instagram` | Instagram profile URL | `https://instagram.com/ivs_passport` |
| `social_linkedin` | LinkedIn company page URL | `https://linkedin.com/company/ivs-passport` |
| `footer_text` | Footer description text | `Streamlining passport services...` |
| `copyright_text` | Copyright notice | `© 2025 IVS - All Rights Reserved.` |
| `developer_credit` | Developer credit line | `Designed by Skytronixs Developer Teams` |

---

## 🔄 How Settings Are Loaded

### 1. AppServiceProvider (Background Process)

Located at: `app/Providers/AppServiceProvider.php`

```php
// This runs automatically on every page load
public function boot(): void
{
    $settings = SiteSetting::getAllSettings(); // Gets from cache or database
    View::share('siteSettings', $settings);    // Makes available to all views
    View::share('siteName', $settings['site_name'] ?? 'IVS');
    View::share('contactEmail', $settings['contact_email'] ?? 'support@ivs-passport.com');
    // ... etc
}
```

### 2. Views Access Settings

In any Blade template file (`.blade.php`), you can use:

```blade
{{ $siteName }}                          <!-- Outputs: IVS -->
{{ $contactEmail }}                      <!-- Outputs: support@ivs-passport.com -->
{{ $siteSettings['contact_phone'] }}    <!-- Outputs: +1 (555) 123-4567 -->
```

### 3. Caching System

```
[Request] → [Check Cache] → [Found?] → [Return Cached Data]
                ↓
              [Not Found]
                ↓
           [Query Database]
                ↓
        [Store in Cache (1 hour)]
                ↓
          [Return Data]
```

---

## 🚨 Common Issues & Solutions

### Issue 1: "I changed the database but nothing updated"
**Solution:** Clear the cache:
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Issue 2: "Site name shows 'IVS' instead of my custom name"
**Causes:**
1. Cache not cleared after database change
2. Database value is actually "IVS" (check the database)
3. Fallback value being used (when database query fails)

**Solution:** 
- Use the Settings Manager at `/admin/settings`
- OR clear cache after manual database edits

### Issue 3: "Settings Manager shows old values"
**Solution:** Hard refresh your browser (Ctrl+F5 or Cmd+Shift+R)

### Issue 4: "All pages show default 'IVS' instead of database values"
**Causes:**
1. Database not seeded (run `php artisan db:seed --class=SiteSettingSeeder`)
2. Cache contains old data
3. Database connection issue

**Solution:**
```bash
# Re-seed the database
php artisan db:seed --class=SiteSettingSeeder

# Clear all caches
php artisan cache:clear
php artisan config:clear  
php artisan view:clear

# Verify settings are loaded
php artisan tinker
>>> App\Models\SiteSetting::all()->pluck('value', 'key');
```

---

## 🔍 Debugging Commands

### Check Current Settings
```bash
# Via web browser
http://localhost:8000/debug-settings

# Via Artisan Tinker
php artisan tinker
>>> App\Models\SiteSetting::all();
>>> App\Models\SiteSetting::getAllSettings();
```

### Verify Cache Status
```bash
php artisan tinker
>>> Cache::has('all_site_settings');  // true if cached
>>> Cache::get('all_site_settings');  // view cached data
>>> Cache::forget('all_site_settings'); // manually clear
```

### Re-seed Settings
```bash
php artisan db:seed --class=SiteSettingSeeder
```

---

## 📝 How to Add New Settings

### Step 1: Add to Database
```php
// In database/seeders/SiteSettingSeeder.php
SiteSetting::create([
    'key' => 'new_setting_name',
    'value' => 'Your Value',
    'type' => 'text'
]);
```

### Step 2: Run Seeder
```bash
php artisan db:seed --class=SiteSettingSeeder
```

### Step 3: Use in Views
```blade
{{ $siteSettings['new_setting_name'] ?? 'Default Value' }}
```

### Step 4: (Optional) Add to Settings Manager Form
Edit `resources/views/admin/settings.blade.php` and add a new input field.

---

## 🎓 Best Practices

1. **Always use the Settings Manager** for updates (automatic cache clearing)
2. **Never hardcode** site information in templates (use dynamic variables)
3. **Provide fallback values** using `{{ $siteName ?? 'IVS' }}`
4. **Clear cache** after direct database edits
5. **Test changes** on local/staging before production

---

## 📞 Quick Reference

| Task | Command/URL |
|------|-------------|
| Update Settings (GUI) | `/admin/settings` |
| Clear All Caches | `php artisan cache:clear` |
| Debug Settings | `/debug-settings` |
| Re-seed Database | `php artisan db:seed --class=SiteSettingSeeder` |
| Check Database | `php artisan tinker` → `App\Models\SiteSetting::all()` |

---

## ✅ Verification Checklist

After changing settings, verify:

- [ ] Settings Manager shows correct values
- [ ] Homepage header shows correct site name
- [ ] Footer shows correct contact info
- [ ] Email links use correct email address
- [ ] Social media icons link to correct URLs
- [ ] Browser tab shows correct site title
- [ ] Legal pages show correct company name

---

**Need Help?** Check the debug route: `http://your-domain.com/debug-settings`

This shows all current settings and whether they're coming from cache or database.
