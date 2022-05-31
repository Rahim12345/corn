<?php

use App\Http\Controllers\front\PagesController;
use App\Http\Controllers\HomeBannerController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'locale'],function (){
    Route::get('/', [PagesController::class, 'home'])
        ->name('front.home');
    Route::get('/services/{slug?}', [PagesController::class, 'services'])
        ->name('front.services');
    Route::get('/service/project-details/{id}', [PagesController::class, 'prodoctDetails'])
        ->name('front.prodoct.details');
});




Route::group(['prefix'=>'admin','middleware'=>['auth', 'locale']],function (){

    Route::get('/',[App\Http\Controllers\AdminController::class,'index'])
        ->name('back.dashboard');
    Route::get('profile',[App\Http\Controllers\profileController::class,'profile'])
        ->name('back.profile');

    Route::resource('option',App\Http\Controllers\OptionController::class);

    Route::resource('home-banner', HomeBannerController::class);
    Route::get('home-banner-deleter/{id}',[HomeBannerController::class,'deleter'])->name('home.banner.deleter');

    Route::get('service-banner',[\App\Http\Controllers\OptionController::class,'servicesBanner'])->name('service.banner');

    Route::post('service-banner-post',[\App\Http\Controllers\OptionController::class,'servicesBannerPost'])->name('service.banner.post');
    Route::resource('service',App\Http\Controllers\ServiceController::class);
    Route::get('service-changer/{id}',[App\Http\Controllers\ServiceController::class,'serviceChanger'])->name('service.changer');
    Route::resource('product',App\Http\Controllers\ProductController::class);
    Route::get('product-image-deleter/{id}',[App\Http\Controllers\ProductImageController::class,'deleter'])->name('image.deleter');
});

Route::get('langs/{locale}',[App\Http\Controllers\profileController::class,'langSwitcher'])
    ->name('lang.swithcher');

Route::get('daxil-ol',[App\Http\Controllers\sign\sign_in_upController::class,'login'])
    ->middleware('locale')
    ->name('login');

Route::post('daxil-ol',[App\Http\Controllers\sign\sign_in_upController::class,'loginPost'])
    ->middleware('locale')
    ->middleware('throttle:5,60')
    ->name('login.post');

Route::get('cixis-et',[App\Http\Controllers\sign\sign_in_upController::class,'logout'])
    ->middleware( 'auth' )
    ->name( 'logout' );

Route::post('avatar-upload',[ App\Http\Controllers\profileController::class,'avatarUpload' ])
    ->name('front.avatar.upload')
    ->middleware('auth');

Route::post('profile',[ App\Http\Controllers\profileController::class,'profileUpdate' ])
    ->name('front.profile.update')
    ->middleware('auth');
