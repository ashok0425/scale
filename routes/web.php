<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index']);
Route::get('/freelancer', [FrontController::class, 'freelancer'])->name('freelancer');
Route::get('/investors', [FrontController::class, 'investor'])->name('investor');
Route::get('/founders', [FrontController::class, 'founder'])->name('founder');
Route::get('/blogs', [FrontController::class, 'blog'])->name('blog');
Route::get('/categort/{slug}', [FrontController::class, 'categoryBlog'])->name('category');

Route::get('/blog/{slug}', [FrontController::class, 'blogDetail'])->name('blog.detail');
Route::post('/subscribe', [FrontController::class, 'subscribe'])->name('subscribe.store');
Route::post('/waitlist', [FrontController::class, 'waitlist'])->name('waitlist.store');
Route::get('/priority-access', [FrontController::class, 'priorityAccess'])->name('priority.access');
Route::post('/priority-access', [FrontController::class, 'storePriorityAccess']);
Route::get('/about-us', [FrontController::class, 'pages']);
Route::get('/terms-of-services', [FrontController::class, 'pages']);
Route::get('/privacy-policy', [FrontController::class, 'pages']);
Route::get('attachment/{attachment_id}/{blog_id?}', [FrontController::class,'attachment'])->name('link.attachment');
Route::post('attachment', [FrontController::class,'SaveAttachment'])->name('link.attachment.save');
Route::get('attachment-download/{encoded_id}/{token}', [FrontController::class, 'downloadFile'])->name('attachment.download.file')->middleware('signed');


















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
    Route::post('/upload', [\App\Http\Controllers\AuthController::class, 'upload']);

    Route::resource('categories', \App\Http\Controllers\CategoryController::class)->middleware('can:do anything');

    Route::resource('posts', \App\Http\Controllers\BlogController::class)->names('blogs');
    Route::resource('banners', \App\Http\Controllers\BannerController::class);
    Route::resource('attachments', \App\Http\Controllers\AttachmentController::class);


    Route::resource('pages', \App\Http\Controllers\PageController::class)->middleware('can:do anything');
    Route::resource('cms', \App\Http\Controllers\CmsController::class)->middleware('can:do anything');
    Route::get('users/index', [\App\Http\Controllers\ManageAccessController::class,'users'])->middleware('can:do anything')->name('users');
    Route::get('crm', [\App\Http\Controllers\ManageAccessController::class,'crm'])->name('crm')->can('view:user');
    Route::get('subscribe', [\App\Http\Controllers\ManageAccessController::class,'subscriber'])->name('subscriber');
    Route::resource('seos', SeoController::class);
    Route::resource('faqs', FaqController::class);




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

