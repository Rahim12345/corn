<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\front\PagesController;
use App\Http\Controllers\HaqqimizdaController;
use App\Http\Controllers\HomeBannerController;
use App\Http\Controllers\PresentationController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    Lfm::routes();
});


Route::group(['middleware'=>'locale'],function (){
    Route::get('/', [PagesController::class, 'home'])
        ->name('front.home');
    Route::get('/about', [PagesController::class, 'about'])
        ->name('front.about');
    Route::get('/contact', [PagesController::class, 'contact'])
        ->name('front.contact');
    Route::post('/contact', [PagesController::class,'contactPost'])
        ->name('front.contact.post');
    Route::get('/blog', [PagesController::class, 'blog'])
        ->name('front.blog');
    Route::get('/blog/{slug}', [PagesController::class, 'blogSingle'])
        ->name('front.blog.single');
    Route::get('/presentation', [PagesController::class, 'presentation'])
        ->name('front.presentation');
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

    Route::get('about-banner',[\App\Http\Controllers\OptionController::class,'aboutBanner'])->name('about.banner');

    Route::post('about-banner-post',[\App\Http\Controllers\OptionController::class,'aboutBannerPost'])->name('about.banner.post');

    Route::get('about-text',[\App\Http\Controllers\OptionController::class,'aboutText'])->name('about.text');

    Route::post('about-text-post',[\App\Http\Controllers\OptionController::class,'aboutTextPost'])->name('about.text.post');

    Route::resource('about', HaqqimizdaController::class);

    Route::resource('presentation', PresentationController::class);

    Route::get('presentation-banner',[\App\Http\Controllers\OptionController::class,'presentationBanner'])->name('presentation.banner');

    Route::post('presentation-banner-post',[\App\Http\Controllers\OptionController::class,'presentationBannerPost'])->name('presentation.banner.post');

    Route::resource('blog', BlogController::class);
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
