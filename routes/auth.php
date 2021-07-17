<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController as AuthAuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController as AuthConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController as AuthEmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController as AuthEmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController as AuthNewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController as AuthPasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredAdminController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController as AuthVerifyEmailController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/register', [RegisteredAdminController::class, 'create'])
                ->middleware('guest')
                ->name('admin.register');

Route::post('/admin/register', [RegisteredAdminController::class, 'store'])
                ->middleware('guest')
                ->name('admin.post_register');

Route::get('/admin/login', [AuthAuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('admin.login');

Route::post('/admin/login', [AuthAuthenticatedSessionController::class, 'store'])
                ->middleware('guest')
                ->name('admin.post_login');

Route::get('/admin/forgot-password', [AuthPasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/admin/forgot-password', [AuthPasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/admin/reset-password/{token}', [AuthNewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('admin.password.reset');

Route::post('/admin/reset-password', [AuthNewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('admin.password.update');

Route::get('/admin/verify-email', [AuthEmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth:admin')
                ->name('admin.verification.notice');

Route::get('/admin/verify-email/{id}/{hash}', [AuthVerifyEmailController::class, '__invoke'])
                ->middleware(['auth:admin', 'signed', 'throttle:6,1'])
                ->name('admin.verification.verify');

Route::post('/admin/email/verification-notification', [AuthEmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth:admin', 'throttle:6,1'])
                ->name('admin.verification.send');

Route::get('/admin/confirm-password', [AuthConfirmablePasswordController::class, 'show'])
                ->middleware('auth:admin')
                ->name('admin.password.confirm');

Route::post('/admin/confirm-password', [AuthConfirmablePasswordController::class, 'store'])
                ->middleware('auth:admin')
                ->name('admin.post.password.confirm');

Route::post('/admin/logout', [AuthAuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:admin')
                ->name('admin.logout');




////////////////////////////////

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
