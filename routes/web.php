<?php
use App\Http\Controllers\Admin\ordersController;
use App\Http\Controllers\Admin\productsController;
use App\Http\Controllers\Admin\subcategoryController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\dashboardcontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {

    Route::controller(dashboardcontroller::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('admindashboard');
 
    });

    Route::controller(categoryController::class)->group(function () {
        Route::get('/admin/add-category', 'addcategory')->name('addcategory');
        Route::get('/admin/all-category', 'allcategory')->name('allcategory');
 
    });

    Route::controller(subcategoryController::class)->group(function () {
        Route::get('/admin/add-sub-category', 'addsubcat')->name('addsubcategory');
        Route::get('/admin/all-sub-category', 'allsubcat')->name('allsubcategory');
 
    });


    Route::controller(productsController::class)->group(function () {
        Route::get('/admin/add-product', 'addproduct')->name('addproduct');
        Route::get('/admin/all-product', 'allproduct')->name('allproduct');
 
    });

    Route::controller(ordersController::class)->group(function () {
        Route::get('/admin/pending-orders', 'pendingord')->name('pendingorders');
        Route::get('/admin/completed-orders', 'completeord')->name('completeorders');
        Route::get('/admin/cancel-orders', 'cancelord')->name('cancelorders');
 
    });
 
    
});


require __DIR__.'/auth.php';





