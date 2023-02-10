<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// Frontend
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
// Backend
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CarController;
use App\Http\Controllers\Backend\ExtraController;
use App\Http\Controllers\Backend\ProtectionController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\CustomerController;

/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe');
Route::get('/about-us', [FrontendController::class, 'about'])->name('about');
Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact');

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::group(['prefix' => '/listings'], function(){
    Route::get('/', [FrontendController::class, 'listing'])->name('listing');
    Route::get('/single-listing/{slug}', [FrontendController::class, 'singleList'])->name('single.list');
    Route::any('/search-listings', [FrontendController::class, 'searchList'])->name('search.listing');
    Route::get('/brand/{slug}', [FrontendController::class, 'brandCar'])->name('brand.car');
});

Route::group(['prefix' => '/cart'], function(){
    Route::get('/', [CartController::class, 'index'])->name('cart.manage');
    Route::post('/store', [CartController::class, 'store'])->name('cart.store');
    Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});

Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');

Route::middleware(['auth', 'verified'])->group(function () {
    // Checkout Pay
    Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('make.payment');
    //User Details And Settings
    Route::group(['prefix' => '/user'], function(){
        Route::get('/settings/{slug}', [FrontendController::class, 'userSetting'])->name('user.setting');
        Route::post('/update/{id}', [FrontendController::class, 'userUpdate'])->name('user.update');
        Route::get('/reserve-list', [FrontendController::class, 'userReserve'])->name('user.reserve');
        Route::get('/reservation/{inv_id}', [FrontendController::class, 'reservation'])->name('reservation');
    });
    
    // SSLCOMMERZ Start
    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
    //SSLCOMMERZ END
});

/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified', 'role'])->group(function () {
    Route::group(['prefix' => '/admin'], function(){
        Route::get('/dashboard', [BackendController::class, 'index'])->name('dashboard');
    
        //Cars
        Route::group(['prefix' => '/car'], function(){
            Route::get('/manage', [CarController::class, 'index'])->name('car.manage');
            Route::get('/create', [CarController::class, 'create'])->name('car.create');
            Route::post('/store', [CarController::class, 'store'])->name('car.store');
            Route::get('/edit/{id}', [CarController::class, 'edit'])->name('car.edit');
            Route::post('/update/{id}', [CarController::class, 'update'])->name('car.update');
            Route::post('/destroy/{id}', [CarController::class, 'destroy'])->name('car.destroy');
        });
    
        //Brands
        Route::group(['prefix' => '/brand'], function(){
            Route::get('/manage', [BrandController::class, 'index'])->name('brand.manage');
            Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
            Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
            Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
            Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
            Route::post('/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
        });
    
        //Extras
        Route::group(['prefix' => '/extra'], function(){
            Route::get('/manage', [ExtraController::class, 'index'])->name('extra.manage');
            Route::get('/create', [ExtraController::class, 'create'])->name('extra.create');
            Route::post('/store', [ExtraController::class, 'store'])->name('extra.store');
            Route::get('/edit/{id}', [ExtraController::class, 'edit'])->name('extra.edit');
            Route::post('/update/{id}', [ExtraController::class, 'update'])->name('extra.update');
            Route::post('/destroy/{id}', [ExtraController::class, 'destroy'])->name('extra.destroy');
        });
    
        //Protections
        Route::group(['prefix' => '/protection'], function(){
            Route::get('/manage', [ProtectionController::class, 'index'])->name('protection.manage');
            Route::get('/create', [ProtectionController::class, 'create'])->name('protection.create');
            Route::post('/store', [ProtectionController::class, 'store'])->name('protection.store');
            Route::get('/edit/{id}', [ProtectionController::class, 'edit'])->name('protection.edit');
            Route::post('/update/{id}', [ProtectionController::class, 'update'])->name('protection.update');
            Route::post('/destroy/{id}', [ProtectionController::class, 'destroy'])->name('protection.destroy');
        });
    
        // Division Route
        Route::group(['prefix' => '/division'], function () {
            Route::get('/manage', [DivisionController::class, 'index'])->name('division.manage');
            Route::get('/create', [DivisionController::class, 'create'])->name('division.create');
            Route::post('/store', [DivisionController::class, 'store'])->name('division.store');
            Route::get('/edit/{id}', [DivisionController::class, 'edit'])->name('division.edit');
            Route::post('/update/{id}', [DivisionController::class, 'update'])->name('division.update');
            Route::post('/destroy/{id}', [DivisionController::class, 'destroy'])->name('division.destroy');
        });
    
        // District Route
        Route::group(['prefix' => '/district'], function () {
            Route::get('/manage', [DistrictController::class, 'index'])->name('district.manage');
            Route::get('/create', [DistrictController::class, 'create'])->name('district.create');
            Route::post('/store', [DistrictController::class, 'store'])->name('district.store');
            Route::get('/edit/{id}', [DistrictController::class, 'edit'])->name('district.edit');
            Route::post('/update/{id}', [DistrictController::class, 'update'])->name('district.update');
            Route::post('/destroy/{id}', [DistrictController::class, 'destroy'])->name('district.destroy');
        });
    
        // Order Route
        Route::group(['prefix' => '/all-orders'], function(){
            Route::get('/manage', [OrderController::class, 'index'])->name('order.manage');
            Route::get('/order-details/{id}', [OrderController::class, 'show'])->name('order.details');
            Route::post('/order-details/update/{id}', [OrderController::class, 'update'])->name('order.update');
        });
    
        // Order Route
        Route::group(['prefix' => '/customers'], function(){
            Route::get('/manage', [CustomerController::class, 'index'])->name('customer.manage');
            Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
            Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
            Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
            Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
            Route::post('/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
        });
    
        // Setting Route
        Route::group(['prefix' => '/setting'], function () {
            Route::get('/manage', [SettingController::class, 'index'])->name('setting.manage');
            Route::post('/update/{id}', [SettingController::class, 'update'])->name('setting.update');
        });
    
        //Subscriber Route
        Route::group(['prefix'=> '/subscriber'], function(){
            Route::get('/manage', [SubscriberController::class, 'index'])->name('subscriber.manage');
            Route::post('/destroy/{id}', [SubscriberController::class, 'destroy'])->name('subscriber.destroy');
        });
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/api.php';
require __DIR__.'/auth.php';

