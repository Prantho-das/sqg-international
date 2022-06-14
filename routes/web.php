<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;







Auth::routes(['register' => false]);

Route::get('/', fn () => view('welcome'));
Route::get('/our-gallery', [GalleryController::class,'galleryfrontend'])->name('gallery');
Route::get('/service', [AboutController::class, 'servicefrontend'])->name('service');

Route::get('/about-us', [FrontendController::class, 'about'])->name('aboutUs');
Route::get('/study-with-us/{slug}', [FrontendController::class, 'study'])->name('study.place');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('contact', ContactUsController::class);

Route::middleware('auth')->group(function () {

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('setting', [FrontendController::class, 'setting'])->name('setting.show');
    Route::post('setting', [FrontendController::class, 'settingStore'])->name('setting.settingStore');

    //ceo talk
    Route::get('ceo-talk', [AboutController::class, 'ceoTalk'])->name('about.ceoTalk');
    Route::get('ceo-talk-create', [AboutController::class, 'ceoTalkCreate'])->name('about.ceoTalkCreate');
    Route::post('ceo-talk', [AboutController::class, 'ceoTalkStore'])->name('about.ceoTalkStore');
    Route::post('ceo-talk-delete/{id}', [AboutController::class, 'ceoTalkDelete'])->name('about.ceoTalkDelete');
    Route::get('ceo-talk-info/{id}', [AboutController::class, 'ceoTalkEdit'])->name('about.ceoTalkEdit');
    Route::put('ceo-talk-info/{id}', [AboutController::class, 'ceoTalkUpdate'])->name('about.ceoTalkUpdate');
    // team member
    Route::get('team-member', [AboutController::class, 'team'])->name('about.team.memeber');
    Route::get('team-member-create', [AboutController::class, 'teamCreate'])->name('about.teamCreate');
    Route::post('team-member', [AboutController::class, 'teamStore'])->name('about.teamStore');
    Route::post('team-member-delete/{id}', [AboutController::class, 'teamDelete'])->name('about.teamDelete');
    Route::get('team-member-info/{id}', [AboutController::class, 'teamEdit'])->name('about.teamEdit');
    Route::put('team-member-info/{id}', [AboutController::class, 'teamUpdate'])->name('about.teamUpdate');
    //services
    Route::get('services', [AboutController::class, 'service'])->name('about.service');
    Route::post('service-create', [AboutController::class, 'serviceStore'])->name('about.service.store');
    Route::get('service-create', [AboutController::class, 'serviceCreate'])->name('about.serviceCreate');
    Route::post('service-delete/{id}', [AboutController::class, 'serviceDelete'])->name('about.serviceDelete');
    Route::get('service-info/{id}', [AboutController::class, 'serviceEdit'])->name('about.serviceEdit');
    Route::put('service-info/{id}', [AboutController::class, 'serviceUpdate'])->name('about.serviceUpdate');

    //slider
    Route::resource('slider', SliderController::class);

    //study
    Route::post('image-delete/{id}', [StudyController::class, 'deleteImage'])->name('study.deleteImage');
    Route::resource('study', StudyController::class);

    //gellery
    Route::resource('gallery', GalleryController::class);
});
