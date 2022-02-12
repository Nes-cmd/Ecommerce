<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\EmailVerificationController;

// $lang = request()->segment(1);
// $locale = ($lang == 'am' || $lang == 'oro')?$lang:'en';
// App::setLocale($locale);

// Livewire components which are group of Customer
Route::namespace('\App\Http\Livewire\Customer\\')->group(function(){
    Route::get('/', Welcome::class)->name('customer.welcome');
    Route::get('customer/detail/{id}', Detail::class)->name('customer.detail');
    Route::get('customer/proceed', Proceed::class)->name('customer.proceed');
    Route::get('customer/list-all/{category?}/{name?}', ListProducts::class)->name('customer.product.list');
});
// Livewire components which are group of Product
Route::namespace('\App\Http\Livewire\Product\\')->group(function(){
    Route::get('product/main', MainPage::class)->name('product.main');
    Route::get('product/upload', Upload::class)->name('product.upload');
    Route::get('product/edit/{id}', Edit::class)->name('product.edit');
    Route::get('product/category', Category::class)->name('product.category');
    Route::get('product/order', Orders::class)->name('product.order');
});
// Livewire components which are group of Manegment
Route::middleware(['auth','verified'])->namespace('\App\Http\Livewire\Admin\\')->group(function(){
    Route::get('dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('admin/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('admin/manage-users', ManegeUser::class)->name('admin.manege-user');
    Route::get('admin/edit/{id}', EditUser::class)->name('admin.edit');
});
Route::middleware('auth')->get('/authenticate', function(){
    return redirect()->route('customer.proceed');
})->name('authenticate');

Route::prefix('email')->name('verification.')->group(function(){
    Route::get('verify', [EmailVerificationController::class,'notice'])->name('notice');
    Route::post('verification-notification', [EmailVerificationController::class,'sendEmail'])->middleware('throttle:6,1')->name('send');
    Route::get('verify/{id}/{hash}', [EmailVerificationController::class,'verify'])->middleware('signed')->name('verify');
});

