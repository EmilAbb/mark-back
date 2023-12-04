<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutInfoController;
use App\Http\Controllers\Admin\AboutSliderController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\FooterMenuController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\LegalController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PracticeController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\TranslationsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('setLocale')->group(function () {
    Route::get('/header',[HeaderController::class,'getHeaderData'])->withoutMiddleware('auth');
    Route::get('/news',[NewsController::class,'getNewsData'])->withoutMiddleware('auth');
    Route::get('/testimonials',[TestimonialsController::class,'getTestiData'])->withoutMiddleware('auth');
    Route::get('/legal',[LegalController::class,'getLegalData'])->withoutMiddleware('auth');
    Route::get('/footer-menu',[FooterMenuController::class,'getFooterMenuData'])->withoutMiddleware('auth');
    Route::get('/homeSlider',[HomeSliderController::class,'getHomeSliderData'])->withoutMiddleware('auth');
    Route::get('/about',[AboutController::class,'getAboutLinks'])->withoutMiddleware('auth');
    Route::get('/aboutInfo',[AboutInfoController::class,'getAboutInfo'])->withoutMiddleware('auth');
    Route::get('/aboutSlider',[AboutSliderController::class,'getAboutSliderData'])->withoutMiddleware('auth');
    Route::get('/services',[ServicesController::class,'getServicesData'])->withoutMiddleware('auth');
    Route::get('/services/{id}',[ServicesController::class,'show'])->withoutMiddleware('auth');
    Route::get('/clients',[ClientsController::class,'getClientsData'])->withoutMiddleware('auth');
    Route::get('/practice',[PracticeController::class,'getPracticeData'])->withoutMiddleware('auth');
    Route::get('/contact',[ContactController::class,'getContactData'])->withoutMiddleware('auth');
    Route::post('/contactMessage',[ContactMessageController::class,'store'])->withoutMiddleware('auth');
    Route::get('/translation/{key}',[TranslationsController::class,'getTranslationsData'])->withoutMiddleware('auth');

});
//Route::get('/header',[HeaderController::class,'getHeaderData'])->withoutMiddleware('auth');
// Route::get('/news',[NewsController::class,'getNewsData'])->withoutMiddleware('auth');
// Route::get('/testimonials',[TestimonialsController::class,'getTestiData'])->withoutMiddleware('auth');
// Route::get('/legal',[LegalController::class,'getLegalData'])->withoutMiddleware('auth');
// Route::get('/footer-menu',[FooterMenuController::class,'getFooterMenuData'])->withoutMiddleware('auth');
// Route::get('/homeSlider',[HomeSliderController::class,'getHomeSliderData'])->withoutMiddleware('auth');
// Route::get('/about',[AboutController::class,'getAboutLinks'])->withoutMiddleware('auth');
// Route::get('/aboutInfo',[AboutInfoController::class,'getAboutInfo'])->withoutMiddleware('auth');
// Route::get('/aboutSlider',[AboutSliderController::class,'getAboutSliderData'])->withoutMiddleware('auth');
// Route::get('/services',[ServicesController::class,'getServicesData'])->withoutMiddleware('auth');
// Route::get('/services/{id}',[ServicesController::class,'show'])->withoutMiddleware('auth');
// Route::get('/clients',[ClientsController::class,'getClientsData'])->withoutMiddleware('auth');
// Route::get('/practice',[PracticeController::class,'getPracticeData'])->withoutMiddleware('auth');
// Route::get('/contact',[ContactController::class,'getContactData'])->withoutMiddleware('auth');
// Route::post('/contactMessage',[ContactMessageController::class,'store'])->withoutMiddleware('auth');
// Route::get('/translation/{key}',[TranslationsController::class,'getTranslationsData'])->withoutMiddleware('auth');


Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, config('app.languages'))) {
        app()->setLocale($lang);
        return "lang".$lang;
    } else {
        app()->setLocale(config('app.fallback_locale'));
        return "lang".$lang;
    }
})
    ->withoutMiddleware('auth');
