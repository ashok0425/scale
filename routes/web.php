<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/freelancer', [HomeController::class, 'freelancer'])->name('freelancer');
Route::get('/investors', [HomeController::class, 'investor'])->name('investor');
Route::get('/founders', [HomeController::class, 'founder'])->name('founder');
Route::get('/blogs', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [HomeController::class, 'blogDetail'])->name('blog.detail');











Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'store']);
//admin guard middleware
Route::middleware('auth')->group(function () {

    // Admin profile
    Route::get('/dashboard', [\App\Http\Controllers\AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [\App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [\App\Http\Controllers\AuthController::class, 'update'])->name('profile.update');
    Route::post('/password/update', [\App\Http\Controllers\AuthController::class, 'changePassword'])->name('password');
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::resource('categories', \App\Http\Controllers\CategoryController::class)->middleware('can:do anything');

    Route::resource('posts', \App\Http\Controllers\BlogController::class)->names('blogs');
    Route::resource('banners', \App\Http\Controllers\BannerController::class);
    Route::resource('attachments', \App\Http\Controllers\AttachmentController::class);


    Route::resource('pages', \App\Http\Controllers\PageController::class)->middleware('can:do anything');
    Route::resource('cms', \App\Http\Controllers\CmsController::class)->middleware('can:do anything');
    Route::get('users/index', [\App\Http\Controllers\ManageAccessController::class,'users'])->middleware('can:do anything')->name('users');
    Route::get('crm', [\App\Http\Controllers\ManageAccessController::class,'crm'])->name('crm');


    Route::group(['prefix' => 'manage-access'], function () {
        Route::get('/', [App\Http\Controllers\ManageAccessController::class, 'index'])->name('access.index');
        Route::get('/create', [App\Http\Controllers\ManageAccessController::class, 'create'])->name('access.create');
        Route::post('/store', [App\Http\Controllers\ManageAccessController::class, 'store'])->name('access.store');
        Route::get('{id}/edit', [App\Http\Controllers\ManageAccessController::class, 'edit'])->name('access.edit');
        Route::post('{id}/update', [App\Http\Controllers\ManageAccessController::class, 'update'])->name('access.update');
        Route::delete('{id}/delete', [App\Http\Controllers\ManageAccessController::class, 'destroy'])->name('access.destroy');
    });

});

Route::get('page/{slug}', function ($slug) {
    return view('page', ['slug' => $slug]);
});


Route::get('blog/{id}', function ($slug) {
    return view('page', ['slug' => $slug]);
});

Route::get('storages', function () {
    Artisan::call('migrate');
    return 'Storage link created';
});

Route::get('download/{attachment_id}/{blog_id?}', [\App\Http\Controllers\ManageAccessController::class,'users'])->name('link.attachment');
