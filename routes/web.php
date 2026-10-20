<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\InstagramReelController;
use Illuminate\Support\Facades\Route;

// Halaman publik
Route::get('/', [PublicController::class, 'index'])
    ->name('home');

Route::get('/layanan/{slug}', [PublicController::class, 'showService'])
    ->name('services.show');

// Login hanya untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])
        ->name('admin.login');

    Route::post('/admin/login', [AuthController::class, 'login'])
        ->middleware('throttle:10,1')
        ->name('admin.login.submit');
});

// Semua area di bawah ini membutuhkan login
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })
            ->middleware('role:admin,editor,verifikator')
            ->name('dashboard');

        // Kategori: admin dan editor
        Route::middleware('role:admin,editor')->group(function () {
            Route::resource('categories', ServiceCategoryController::class)
                ->except(['show']);
        });

        // Daftar layanan dapat dilihat admin, editor, dan verifikator
        Route::get('services', [ServiceController::class, 'index'])
            ->middleware('role:admin,editor,verifikator')
            ->name('services.index');

        // Pengelolaan konten layanan: admin dan editor
        Route::middleware('role:admin,editor')->group(function () {
            Route::get('services/create', [ServiceController::class, 'create'])
                ->name('services.create');

            Route::post('services', [ServiceController::class, 'store'])
                ->name('services.store');

            Route::get('services/{service}/edit', [ServiceController::class, 'edit'])
                ->whereNumber('service')
                ->name('services.edit');

            Route::put('services/{service}', [ServiceController::class, 'update'])
                ->whereNumber('service')
                ->name('services.update');

            Route::delete('services/{service}', [ServiceController::class, 'destroy'])
                ->whereNumber('service')
                ->name('services.destroy');
        });

        // Verifikasi dan publikasi layanan: admin dan verifikator
        Route::middleware('role:admin,verifikator')->group(function () {
            Route::post('services/{service}/verify', [ServiceController::class, 'verify'])
                ->whereNumber('service')
                ->name('services.verify');

            Route::patch('services/{service}/publish', [ServiceController::class, 'publish'])
                ->whereNumber('service')
                ->name('services.publish');

            Route::patch('services/{service}/unpublish', [ServiceController::class, 'unpublish'])
                ->whereNumber('service')
                ->name('services.unpublish');
        });

        // Daftar FAQ dapat dilihat admin, editor, dan verifikator
        Route::get('faqs', [FaqController::class, 'index'])
            ->middleware('role:admin,editor,verifikator')
            ->name('faqs.index');

        // Pengelolaan FAQ: admin dan editor
        Route::middleware('role:admin,editor')->group(function () {
            Route::get('faqs/create', [FaqController::class, 'create'])
                ->name('faqs.create');

            Route::post('faqs', [FaqController::class, 'store'])
                ->name('faqs.store');

            Route::get('faqs/{faq}/edit', [FaqController::class, 'edit'])
                ->whereNumber('faq')
                ->name('faqs.edit');

            Route::put('faqs/{faq}', [FaqController::class, 'update'])
                ->whereNumber('faq')
                ->name('faqs.update');

            Route::delete('faqs/{faq}', [FaqController::class, 'destroy'])
                ->whereNumber('faq')
                ->name('faqs.destroy');
        });

        // Verifikasi dan publikasi FAQ: admin dan verifikator
        Route::middleware('role:admin,verifikator')->group(function () {
            Route::post('faqs/{faq}/verify', [FaqController::class, 'verify'])
                ->whereNumber('faq')
                ->name('faqs.verify');

            Route::patch('faqs/{faq}/publish', [FaqController::class, 'publish'])
                ->whereNumber('faq')
                ->name('faqs.publish');

            Route::patch('faqs/{faq}/unpublish', [FaqController::class, 'unpublish'])
                ->whereNumber('faq')
                ->name('faqs.unpublish');
        });


        // Daftar Reels dapat dilihat admin, editor, dan verifikator.
        Route::get('instagram-reels', [InstagramReelController::class, 'index'])
            ->middleware('role:admin,editor,verifikator')
            ->name('instagram-reels.index');

        // Pengelolaan Reels: admin dan editor.
        Route::middleware('role:admin,editor')->group(function () {
            Route::get('instagram-reels/create', [InstagramReelController::class, 'create'])
                ->name('instagram-reels.create');

            Route::post('instagram-reels', [InstagramReelController::class, 'store'])
                ->name('instagram-reels.store');

            Route::get('instagram-reels/{instagramReel}/edit', [InstagramReelController::class, 'edit'])
                ->whereNumber('instagramReel')
                ->name('instagram-reels.edit');

            Route::put('instagram-reels/{instagramReel}', [InstagramReelController::class, 'update'])
                ->whereNumber('instagramReel')
                ->name('instagram-reels.update');

            Route::delete('instagram-reels/{instagramReel}', [InstagramReelController::class, 'destroy'])
                ->whereNumber('instagramReel')
                ->name('instagram-reels.destroy');
        });

        // Verifikasi dan publikasi Reels: admin dan verifikator.
        Route::middleware('role:admin,verifikator')->group(function () {
            Route::post('instagram-reels/{instagramReel}/verify', [InstagramReelController::class, 'verify'])
                ->whereNumber('instagramReel')
                ->name('instagram-reels.verify');

            Route::patch('instagram-reels/{instagramReel}/publish', [InstagramReelController::class, 'publish'])
                ->whereNumber('instagramReel')
                ->name('instagram-reels.publish');

            Route::patch('instagram-reels/{instagramReel}/unpublish', [InstagramReelController::class, 'unpublish'])
                ->whereNumber('instagramReel')
                ->name('instagram-reels.unpublish');
        });

    });
