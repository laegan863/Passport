# Admin Authentication System - Complete Guide

## Overview
Secure admin authentication system with login/logout functionality and middleware protection for the admin panel.

## Admin Credentials

### Default Login
- **Email**: `admin@ivs.com`
- **Password**: `admin123`
- **Login URL**: `http://localhost/Passport/Passport/public/admin/login`

⚠️ **Security Note**: Please change the password after first login!

## Features Implemented

### 1. User Authentication System
- ✅ Login page with beautiful gradient design
- ✅ Remember me functionality
- ✅ Session management
- ✅ Logout functionality
- ✅ Admin-only access control

### 2. Database Structure

#### Users Table (Extended)
```php
Schema::table('users', function (Blueprint $table) {
    $table->boolean('is_admin')->default(false);
});
```

**Fields:**
- `id` - Primary key
- `name` - Admin name
- `email` - Login email (unique)
- `password` - Hashed password
- `is_admin` - Boolean flag for admin access
- `remember_token` - For "remember me" functionality
- `email_verified_at` - Email verification timestamp
- `created_at` - Account creation timestamp
- `updated_at` - Last update timestamp

### 3. Middleware Protection

#### AdminMiddleware
```php
Location: app/Http/Middleware/AdminMiddleware.php
```

**Functionality:**
- Checks if user is authenticated
- Verifies user has admin privileges
- Redirects to login if not authenticated
- Logs out non-admin users attempting access

**Protected Routes:**
- `/admin/dashboard`
- `/admin/orders`
- `/admin/orders/{id}`
- `/admin/settings`
- All admin panel routes

### 4. Controllers

#### AuthController
```php
Location: app/Http/Controllers/AuthController.php
```

**Methods:**
- `showLogin()` - Display login form
- `login(Request $request)` - Process login
- `logout(Request $request)` - Process logout

**Login Validation:**
- Email: Required, must be valid email format
- Password: Required, minimum 6 characters

**Features:**
- Session regeneration on login
- Intended redirect after login
- Admin verification
- Error messages for invalid credentials
- Success messages on logout

### 5. Routes Configuration

#### Public Routes (No Auth Required)
```php
GET  /admin/login      -> Show login form
POST /admin/login      -> Process login
```

#### Protected Routes (Auth Required)
```php
POST   /admin/logout                  -> Logout
GET    /admin/dashboard               -> Dashboard
GET    /admin/orders                  -> Orders list
GET    /admin/orders/{id}             -> Order details
PATCH  /admin/orders/{id}/status      -> Update status
DELETE /admin/orders/{id}             -> Delete order
DELETE /admin/orders-bulk-delete      -> Bulk delete
GET    /admin/orders-export           -> Export CSV
GET    /admin/settings                -> Site settings
POST   /admin/settings                -> Update settings
```

### 6. Views

#### Login Page
```blade
Location: resources/views/admin/login.blade.php
```

**Features:**
- Purple gradient background matching admin panel
- Responsive card design
- Icon-based UI with Bootstrap Icons
- Form validation errors display
- Success/error message alerts
- Remember me checkbox
- Back to website link
- Auto-dismissible alerts

**Design Elements:**
- Tahoma font family
- 420px max width
- Centered layout
- Shadow effects
- Hover animations
- Mobile responsive

#### Admin Layout Updates
```blade
Location: resources/views/admin/layout.blade.php
```

**Changes:**
- Display logged-in user name in sidebar
- Functional logout button in sidebar
- Display user name in top navbar dropdown
- Logout button in dropdown menu
- Updated Settings link to use correct route

## Security Features

### 1. Password Hashing
```php
'password' => Hash::make('admin123')
```
- Uses Laravel's built-in bcrypt hashing
- Passwords never stored in plain text
- Automatic hashing via model cast

### 2. Session Security
- Session regeneration on login
- Token regeneration on logout
- Session invalidation on logout
- CSRF protection on all forms

### 3. Access Control
- Middleware checks on every admin route
- Automatic logout of non-admin users
- Redirect to login for unauthenticated users
- Intended URL redirect after login

### 4. Remember Me
- Secure token storage
- Automatic re-authentication
- Optional feature via checkbox

## Usage Instructions

### For Administrators

#### First Time Login
1. Navigate to: `http://localhost/Passport/Passport/public/admin/login`
2. Enter default credentials:
   - Email: `admin@ivs.com`
   - Password: `admin123`
3. Click "Sign In"
4. ⚠️ Change password immediately for security

#### Subsequent Logins
1. Visit login page
2. Enter your email and password
3. Check "Remember me" for convenience
4. Click "Sign In"

#### Logout
**Option 1: Sidebar**
- Click "Logout" button at bottom of sidebar

**Option 2: Top Navbar**
- Click user name dropdown
- Select "Logout"

### For Developers

#### Creating New Admin Users
```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin Name',
    'email' => 'admin@example.com',
    'password' => Hash::make('secure-password'),
    'is_admin' => true,
    'email_verified_at' => now(),
]);
```

#### Checking Admin Status
```php
// In controller
if (auth()->user()->isAdmin()) {
    // Admin-specific logic
}

// In blade
@if(auth()->check() && auth()->user()->isAdmin())
    <!-- Admin content -->
@endif
```

#### Protecting Custom Routes
```php
Route::middleware(['admin'])->group(function() {
    // Your protected routes
});
```

## Files Created/Modified

### New Files
1. `database/migrations/2025_10_13_100000_add_is_admin_to_users_table.php`
2. `database/seeders/AdminUserSeeder.php`
3. `app/Http/Middleware/AdminMiddleware.php`
4. `app/Http/Controllers/AuthController.php`
5. `resources/views/admin/login.blade.php`

### Modified Files
1. `app/Models/User.php` - Added is_admin field and isAdmin() method
2. `bootstrap/app.php` - Registered admin middleware
3. `routes/web.php` - Added auth routes and middleware protection
4. `resources/views/admin/layout.blade.php` - Updated logout and user display

## Configuration

### Session Configuration
Located in `config/session.php` (default Laravel settings):
- Driver: file
- Lifetime: 120 minutes
- Expire on close: false

### Authentication Configuration
Located in `config/auth.php` (default Laravel settings):
- Guard: web
- Provider: users
- Model: App\Models\User

## Troubleshooting

### Issue: "Please login to access the admin panel"
**Solution:** Session expired or not logged in. Visit `/admin/login`

### Issue: "You do not have admin access"
**Solution:** User account doesn't have `is_admin = true`. Update via database:
```sql
UPDATE users SET is_admin = 1 WHERE email = 'your@email.com';
```

### Issue: Can't login with correct credentials
**Solution:** Clear cache and sessions:
```bash
php artisan cache:clear
php artisan config:clear
php artisan session:flush
```

### Issue: Redirected to login after already logging in
**Solution:** Check middleware is properly registered in `bootstrap/app.php`

### Issue: 419 Page Expired on login
**Solution:** CSRF token issue. Clear browser cookies and cache.

## Site Settings Integration

### Current Status
✅ Site settings are now properly linked in the admin panel!

### Access Site Settings
1. Login to admin panel
2. Click "Site Settings" in sidebar **OR**
3. Click user dropdown → "Settings"
4. URL: `http://localhost/Passport/Passport/public/admin/settings`

### Updated Routes
- **Old (broken)**: `/admin/settings` → `settings.index`
- **New (working)**: `/admin/settings` → `admin.settings` ✅

### Changes Made
1. Updated sidebar link:
   ```blade
   <a href="{{ route('admin.settings') }}">
   ```

2. Updated top navbar dropdown:
   ```blade
   <a href="{{ route('admin.settings') }}">
   ```

3. Protected with admin middleware:
   ```php
   Route::middleware(['admin'])->group(function() {
       Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
   });
   ```

## Testing Checklist

### Authentication
- [x] Login with valid credentials works
- [x] Login with invalid credentials shows error
- [x] Remember me functionality works
- [x] Session persists across requests
- [x] Logout clears session

### Access Control
- [x] Unauthenticated users redirected to login
- [x] Non-admin users cannot access admin panel
- [x] Admin users can access all admin routes
- [x] Middleware protects all admin routes

### UI/UX
- [x] Login page displays correctly
- [x] Error messages show properly
- [x] Success messages show properly
- [x] User name displays in sidebar
- [x] User name displays in navbar
- [x] Logout button works in sidebar
- [x] Logout button works in navbar
- [x] Site settings link works
- [x] Responsive on mobile

## Security Best Practices

### Implemented ✅
- Password hashing (bcrypt)
- CSRF protection
- Session management
- Middleware protection
- Input validation
- SQL injection prevention (Eloquent ORM)

### Recommended Additions
1. **Rate Limiting**: Add login attempt limits
   ```php
   Route::post('/login', [AuthController::class, 'login'])
       ->middleware('throttle:5,1');
   ```

2. **Two-Factor Authentication**: Add 2FA for extra security

3. **Password Complexity**: Enforce strong passwords
   ```php
   'password' => ['required', 'min:8', 'regex:/[A-Z]/', 'regex:/[0-9]/']
   ```

4. **Activity Logging**: Log all admin actions

5. **IP Whitelisting**: Restrict admin access by IP

6. **Password Reset**: Add forgot password functionality

## Environment Variables

Add these to `.env` for production:
```env
# Session
SESSION_DRIVER=database
SESSION_LIFETIME=120

# Admin Email (for notifications)
ADMIN_EMAIL=admin@ivs.com

# Force HTTPS in production
SESSION_SECURE_COOKIE=true
```

## Backup and Recovery

### Backup Admin User
```bash
mysqldump -u root database_name users > users_backup.sql
```

### Create Emergency Admin
If locked out, run in terminal:
```bash
php artisan tinker
```
```php
$user = App\Models\User::where('email', 'admin@ivs.com')->first();
$user->password = bcrypt('newpassword');
$user->is_admin = true;
$user->save();
```

## Summary

✅ **Admin authentication system fully implemented**
✅ **Default admin user created (admin@ivs.com / admin123)**
✅ **All admin routes protected with middleware**
✅ **Login/logout functionality working**
✅ **Site settings properly linked**
✅ **User information displayed in admin panel**
✅ **Secure session management**
✅ **Beautiful login page design**
✅ **Responsive and mobile-friendly**

### Quick Access Links
- **Login**: http://localhost/Passport/Passport/public/admin/login
- **Dashboard**: http://localhost/Passport/Passport/public/admin/dashboard
- **Orders**: http://localhost/Passport/Passport/public/admin/orders
- **Settings**: http://localhost/Passport/Passport/public/admin/settings

The admin panel is now fully secured and ready for use! 🎉
