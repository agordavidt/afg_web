<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DataImportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\OpportunityController as AdminOpportunityController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\Student\RegistrationController;
use App\Http\Controllers\Student\PaymentController;
use App\Http\Controllers\HomeController;

// ── FRONTEND ROUTES ──────────────────────────────────────────────────────────

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/opportunities',        [OpportunityController::class, 'index'])->name('opportunities.index');
Route::get('/opportunities/{slug}', [OpportunityController::class, 'show'])->name('opportunities.show');

Route::get('/articles',        [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/donation', function () {
    return view('donation');
})->name('donation');

// ── ADMIN AUTH ────────────────────────────────────────────────────────────────

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login',   [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login',  [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ── PROTECTED ADMIN ROUTES ────────────────────────────────────────────────────

Route::prefix('admin')->name('admin.')->middleware(['admin.auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ── User Management ───────────────────────────────────────────────────────
    Route::get('/users',                 [UserController::class, 'index'])->name('users.index');
    Route::get('/users/pending',         [UserController::class, 'pending'])->name('users.pending');
    Route::get('/users/completed',       [UserController::class, 'completed'])->name('users.completed');
    Route::get('/users/paid',            [UserController::class, 'paid'])->name('users.paid');
    Route::get('/users/payment-pending', [UserController::class, 'paymentPending'])->name('users.payment-pending');
    Route::get('/users/accepted',        [UserController::class, 'accepted'])->name('users.accepted');
    Route::get('/users/rejected',        [UserController::class, 'rejected'])->name('users.rejected');

    Route::get   ('/users/{user}',        [UserController::class, 'show'])->name('users.show');
    Route::get   ('/users/{user}/edit',   [UserController::class, 'edit'])->name('users.edit');
    Route::put   ('/users/{user}',        [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}',        [UserController::class, 'destroy'])->name('users.destroy');
    Route::patch ('/users/{user}/status', [UserController::class, 'updateApplicationStatus'])->name('users.update-status');

    // Payment Management
    Route::post('/users/{user}/payments/{payment}/approve', [UserController::class, 'approvePayment'])->name('users.payments.approve');
    Route::post('/users/{user}/payments/{payment}/reject',  [UserController::class, 'rejectPayment'])->name('users.payments.reject');

    // SMS Management
    Route::post('/users/{user}/sms', [UserController::class, 'sendSms'])->name('users.send-sms');
    Route::post('/users/bulk-sms',   [UserController::class, 'bulkSms'])->name('users.bulk-sms');
    Route::get ('/sms/settings',     [UserController::class, 'smsSettings'])->name('sms.settings');
    Route::post('/sms/test',         [UserController::class, 'testSms'])->name('sms.test');
    Route::get ('/sms/balance',      [UserController::class, 'getSmsBalance'])->name('sms.balance');

    // ── Articles ──────────────────────────────────────────────────────────────
    Route::get   ('/articles',             [AdminArticleController::class, 'index'])->name('articles.index');
    Route::get   ('/articles/create',      [AdminArticleController::class, 'create'])->name('articles.create');
    Route::post  ('/articles',             [AdminArticleController::class, 'store'])->name('articles.store');
    Route::get   ('/articles/{article}',       [AdminArticleController::class, 'show'])->name('articles.show');
    Route::get   ('/articles/{article}/edit',  [AdminArticleController::class, 'edit'])->name('articles.edit');
    Route::put   ('/articles/{article}',       [AdminArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}',       [AdminArticleController::class, 'destroy'])->name('articles.destroy');

    // ── Opportunities ─────────────────────────────────────────────────────────
    Route::get   ('/opportunities',                    [AdminOpportunityController::class, 'index'])->name('opportunities.index');
    Route::get   ('/opportunities/create',             [AdminOpportunityController::class, 'create'])->name('opportunities.create');
    Route::post  ('/opportunities',                    [AdminOpportunityController::class, 'store'])->name('opportunities.store');
    Route::get   ('/opportunities/{opportunity}/edit', [AdminOpportunityController::class, 'edit'])->name('opportunities.edit');
    Route::put   ('/opportunities/{opportunity}',      [AdminOpportunityController::class, 'update'])->name('opportunities.update');
    Route::delete('/opportunities/{opportunity}',      [AdminOpportunityController::class, 'destroy'])->name('opportunities.destroy');

    // ── Data Import ───────────────────────────────────────────────────────────
    Route::get ('/import',           [DataImportController::class, 'index'])->name('import.index');
    Route::post('/import/upload',    [DataImportController::class, 'upload'])->name('import.upload');
    Route::post('/import/create',    [DataImportController::class, 'create'])->name('import.create');
    Route::get ('/import/template',  [DataImportController::class, 'downloadTemplate'])->name('import.template');

    // ── Application Settings ──────────────────────────────────────────────────
    Route::get ('/settings/application-deadline', [SettingController::class, 'index'])->name('settings.deadline.index');
    Route::post('/settings/application-deadline', [SettingController::class, 'store'])->name('settings.deadline.store');
});

// ── STUDENT ROUTES ────────────────────────────────────────────────────────────

Route::prefix('student')->name('student.')->group(function () {
    Route::get ('/register',     [RegistrationController::class, 'index'])->name('register');
    Route::post('/verify-phone', [RegistrationController::class, 'verifyPhone'])->name('verify-phone');

    Route::get ('/profile', [RegistrationController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [RegistrationController::class, 'updateProfile'])->name('profile.update');

    Route::get ('/payment', [RegistrationController::class, 'showPayment'])->name('payment');
    Route::post('/payment', [RegistrationController::class, 'processPayment'])->name('payment.process');

    Route::get('/status', [RegistrationController::class, 'status'])->name('status');
});