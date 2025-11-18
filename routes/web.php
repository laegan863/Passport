<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupportContactController;
use App\Http\Controllers\AdminSupportController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AdminNewsletterController;
use App\Models\SiteSetting;
use App\Http\Controllers\FamilyInfoController;

// Admin Login Routes (No Authentication Required)
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Admin Panel Routes (Authentication Required)
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function() {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Orders Management
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::get('/orders/{id}', [AdminController::class, 'orderShow'])->name('orders.show');
    Route::patch('/orders/{id}/status', [AdminController::class, 'updateStatus'])->name('orders.update-status');
    Route::delete('/orders/{id}', [AdminController::class, 'orderDelete'])->name('orders.delete');
    Route::delete('/orders-bulk-delete', [AdminController::class, 'bulkDelete'])->name('orders.bulk-delete');
    Route::get('/orders-export', [AdminController::class, 'exportOrders'])->name('orders.export');
    
    // Settings Management
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
    
    // Support Management
    Route::get('/support', [AdminSupportController::class, 'index'])->name('support.index');
    Route::get('/support/{id}', [AdminSupportController::class, 'show'])->name('support.show');
    Route::put('/support/{id}/status', [AdminSupportController::class, 'updateStatus'])->name('support.update-status');
    Route::delete('/support/{id}', [AdminSupportController::class, 'destroy'])->name('support.destroy');
    
    // Newsletter Management
    Route::get('/newsletter', [AdminNewsletterController::class, 'index'])->name('newsletter.index');
    Route::put('/newsletter/{id}/status', [AdminNewsletterController::class, 'updateStatus'])->name('newsletter.update-status');
    Route::delete('/newsletter/{id}', [AdminNewsletterController::class, 'destroy'])->name('newsletter.destroy');
    Route::get('/newsletter-export', [AdminNewsletterController::class, 'export'])->name('newsletter.export');
});

// Debug route to check site settings
Route::get('/debug-settings', function() {
    $settings = SiteSetting::getAllSettings();
    return response()->json([
        'all_settings' => $settings,
        'site_name' => $settings['site_name'] ?? 'NOT FOUND',
        'cached' => \Cache::has('all_site_settings'),
    ]);
});

Route::view('/', 'main.content.landing')->name('page.landing');
Route::view('how-it-works', 'main.content.how-it-works')->name('page.how-it-works');

// Support Contact Form Submission
Route::post('support/submit', [SupportContactController::class, 'submit'])->name('support.submit');

// Newsletter Subscription
Route::post('newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::view('privacy-policy', 'main.content.privacy-policy')->name('page.privacy-policy');
Route::view('terms-of-service', 'main.content.terms-of-service')->name('page.terms-of-service');
Route::view('refund-policy', 'main.content.refund-policy')->name('page.refund-policy');
Route::view('legal-disclaimer', 'main.content.legal-disclaimer')->name('page.legal-disclaimer');
Route::view('terms-of-use', 'main.content.terms-of-use')->name('page.terms-of-use');
Route::view('thankyou', 'main.content.thankyou')->name('thankyou');

Route::controller(FormController::class)->group(function() {
    Route::prefix('application-form')->group(function() {
        Route::get('renewal-passport', 'renewal_passport')->name('renewal-passport');
        Route::get('new-passport', 'new_passport')->name('new-passport');
        Route::get('lost-passport', 'lost_passport')->name('lost-passport');
        Route::get('child-passport', 'child_passport')->name('child-passport');
        Route::get('stolen-passport', 'stolen_passport')->name('stolen-passport');
        Route::get('damage-passport', 'damage_passport')->name('damage-passport');    

        Route::get('select-passport-type', 'select_passport')->name('page.select-passport');
        Route::get('eligibility-questions', 'renewal_before_application')->name('page.eq');
        Route::get('personal-information', 'personal_info')->name('personal-info');
        Route::get('contact-information', 'contact_info')->name('contact-info');
        Route::get('passport-details', 'passport_details')->name('passport-details');
        Route::get('emergency-contact', 'emergency_contact')->name('emergency-contact');
        Route::get('travel-plans', 'travel_plans')->name('travel-plans');
        Route::get('verification', 'verification')->name('verification');
    });

    Route::post('personal-info', 'store_personal_info')->name('store.personal-info');
    Route::post('contact-info', 'store_contact_info')->name('store.contact-info');
    Route::post('passport-details','store_passport_details')->name('store.passport-details');
    Route::post('emergency-contact', 'store_emergency_contact')->name('store.emergency-contact');
    Route::post('travel-plans','store_travel_plans')->name('store.travel-plans');
    Route::post('store-verification', 'store_verification')->name('store.verification');
});

Route::view('checkout', 'main.checkout.checkout')->name('checkout');
Route::get('family-info', [FamilyInfoController::class, 'create'])->name('family-info');
Route::post('family-info', [FamilyInfoController::class, 'store'])->name('store.family-info');