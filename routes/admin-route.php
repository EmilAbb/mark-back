<?php



//,'middleware'=>'admin'
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutInfoController;
use App\Http\Controllers\Admin\AboutSliderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\FooterMenuController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\LegalController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PracticeController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\TranslationsController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login',[AdminController::class,'loginView'])->name('admin.login-view');
Route::post('/admin/login',[AdminController::class,'login'])->name('admin.login');

Route::group(['prefix'=>'admin','as'=>'admin.','middleware' => 'admin'],function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::resource('/translation',TranslationsController::class)->except('show');
    Route::resource('/menus',MenuController::class)->except('show');


    Route::resource('/header',HeaderController::class)->except('show');
    Route::resource('/homeSlider',HomeSliderController::class)->except('show');
//    ABOUT
    Route::resource('/about',AboutController::class)->except('show');
    Route::resource('/aboutInfo',AboutInfoController::class)->except('show');
    Route::resource('/aboutSlider',AboutSliderController::class)->except('show');
//    SERVICES
    Route::resource('/services',ServicesController::class)->except('show');
//    CLIENTS
    Route::resource('/clients',ClientsController::class)->except('show');
//    PRACTICE
    Route::resource('/practice',PracticeController::class)->except('show');
//    CONTACT
    Route::resource('/contact',ContactController::class)->except('show');
    Route::resource('/contactForm',ContactMessageController::class)->except('show');

    Route::resource('/news',NewsController::class)->except('show');
    Route::resource('/testimonials',TestimonialsController::class)->except('show');
    Route::resource('/legal',LegalController::class)->except('show');
    Route::resource('/footer-menu',FooterMenuController::class)->except('show');

});
