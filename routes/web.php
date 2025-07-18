<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\PriorityAccessController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::domain('blog.scaledux.com')->group(function () {
    Route::get('/', [FrontController::class, 'blog'])->name('blog');
    Route::get('/{slug}', [FrontController::class, 'blogDetail'])->name('blog.detail');
   Route::get('/category/{slug}', [FrontController::class, 'categoryBlog'])->name('category');
  Route::post('/waitlist/store', [FrontController::class, 'waitlistStore'])->name('waitlist.footer');
});
//  Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
//     Route::get('/{slug}', [FrontController::class, 'blogDetail'])->name('blog.detail');
// Route::get('/category/{slug}', [FrontController::class, 'categoryBlog'])->name('category');

Route::redirect('/blog','https://blog.scaledux.com',301);

Route::get('/', [FrontController::class, 'index'])->name('/');
Route::get('/freelancer', [FrontController::class, 'freelancer'])->name('freelancer');
Route::get('/investors', [FrontController::class, 'investor'])->name('investor');
Route::get('/founders', [FrontController::class, 'founder'])->name('founder');

Route::get('/unsubscribe/{uuid}', [FrontController::class, 'unsubscribe'])->name('unsubscribe');
Route::post('/unsubscribe/{uuid}', [FrontController::class, 'unsubscribeStore']);





Route::post('/subscribe', [FrontController::class, 'subscribe'])->name('subscribe.store');
Route::post('/waitlist', [FrontController::class, 'waitlist'])->name('waitlist.store');
Route::post('/waitlist/store', [FrontController::class, 'waitlistStore'])->name('waitlist.store.footer');
Route::get('/priority-access', [PriorityAccessController::class, 'priorityAccess'])->name('priority.access');
Route::post('/priority-access', [PriorityAccessController::class, 'storePriorityAccess']);

Route::get('attachment/{attachment_id}/{blog_id?}', [FrontController::class,'attachment'])->name('link.attachment');
Route::post('attachment', [FrontController::class,'SaveAttachment'])->name('link.attachment.save');
Route::get('attachment-download/{encoded_id}/{token}', [FrontController::class, 'downloadFile'])->name('attachment.download.file')->middleware('signed');
Route::get('phone-callback/', [PriorityAccessController::class,'phonePeCallback'])->name('phonepe.callback');
Route::get('phone-success', [PriorityAccessController::class,'phonePeSuccess'])->name('phonepe.success');




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
    Route::resource('teams', \App\Http\Controllers\TeamController::class);
    Route::resource('recognitions', \App\Http\Controllers\RecognitionController::class);

    Route::resource('attachments', \App\Http\Controllers\AttachmentController::class);


    Route::resource('pages', \App\Http\Controllers\PageController::class)->middleware('can:do anything');
    Route::resource('cms', \App\Http\Controllers\CmsController::class)->middleware('can:do anything');
    Route::get('users/index', [\App\Http\Controllers\ManageAccessController::class,'users'])->middleware('can:do anything')->name('users');
    Route::get('crm', [\App\Http\Controllers\ManageAccessController::class,'crm'])->name('crm')->can('view:user');
    Route::get('subscribe', [\App\Http\Controllers\ManageAccessController::class,'subscriber'])->name('subscriber');
    Route::resource('seos', SeoController::class);
    Route::resource('faqs', FaqController::class);
    Route::get('crm/{id}', [\App\Http\Controllers\ManageAccessController::class,'crmDelete'])->name('crm.delete');
    Route::get('crm/{id}/edit', [\App\Http\Controllers\ManageAccessController::class,'crmEdit'])->name('crm.edit');
    Route::post('crm/{id}/update', [\App\Http\Controllers\ManageAccessController::class,'crmUpdate'])->name('crm.update');

   Route::get('/crm/user/{id}', [\App\Http\Controllers\ManageAccessController::class, 'show'])->name('crm.show');




    Route::group(['prefix' => 'manage-access'], function () {
        Route::get('/', [App\Http\Controllers\ManageAccessController::class, 'index'])->name('access.index');
        Route::get('/create', [App\Http\Controllers\ManageAccessController::class, 'create'])->name('access.create');
        Route::post('/store', [App\Http\Controllers\ManageAccessController::class, 'store'])->name('access.store');
        Route::get('{id}/edit', [App\Http\Controllers\ManageAccessController::class, 'edit'])->name('access.edit');
        Route::post('{id}/update', [App\Http\Controllers\ManageAccessController::class, 'update'])->name('access.update');
        Route::delete('{id}/delete', [App\Http\Controllers\ManageAccessController::class, 'destroy'])->name('access.destroy');
    });


      Route::resource('emailgroups', App\Http\Controllers\EmailGroupController::class, [
        'as' => 'admin'
    ]);

    Route::resource('campaigns', App\Http\Controllers\NewsletterController::class, [
        'as' => 'admin'
    ]);
    Route::get('camapaign/{id}/status',[App\Http\Controllers\NewsletterController::class,'updateStatus'])->name('admin.campaigns.status');
    Route::get('api/emails',[App\Http\Controllers\EmailGroupController::class,'getemails']);
    Route::get('/all-subscriber',[App\Http\Controllers\EmailGroupController::class,'emails'])->name('admin.emails.index');
    Route::get('/subscriber/{id}',[App\Http\Controllers\EmailGroupController::class,'show'])->name('admin.emails.show');
    Route::post('/subscriber/import',[App\Http\Controllers\NewsletterController::class,'import'])->name('admin.subscriber.import');
    Route::post('/subscriber/store',[App\Http\Controllers\NewsletterController::class,'storeEmail'])->name('admin.subscriber.store');


    Route::post('/api/emails/add-to-group',[App\Http\Controllers\EmailGroupController::class,'addtogroup'])->name('admin.emails.group');
    Route::post('/send-test-email',[App\Http\Controllers\NewsletterController::class,'testMail'])->name('admin.test.mail');
    Route::get('/add-email',[App\Http\Controllers\NewsletterController::class,'oldNewsletter']);
    Route::post('/add-email',[App\Http\Controllers\NewsletterController::class,'storeoldNewsletter']);



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

Route::get('email/open/{campaign_id}',App\Http\Controllers\MarkEmailController::class)->name('email.open');
Route::get('/{slug?}', [FrontController::class, 'pages'])->name('page');
