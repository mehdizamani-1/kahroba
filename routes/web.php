<?php
//namespace App\Http\Controllers;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Location\LocationController;
use App\Http\Livewire\Counter;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
Route::get('/config-cache', function() {
    Artisan::call('route:clear') ;
    Artisan::call('view:clear') ;
    Artisan::call('cache:clear') ;
    Artisan::call('config:clear') ;
    Artisan::call('config:cache') ;
    return "Cache is cleared & Config is cached" ;
}) ;
Route::get('/login', [LoginController::class, 'login']);
Route::post('/auth/login', [LoginController::class, 'postLogin']);
Route::group([
    'middleware' => ['auth']
], function()
{
    Route::get('/home', [HomeController::class, 'home'])->name('home') ;

    /**
     * --------------------------------------------------------------------------- *
     * -------------------------------- Admin ROUTES ------------------------------ *
     */
    Route::get('/admins', [AdminController::class, 'users'])->name('admins');
    Route::get('/admin/create', [AdminController::class, 'createUser'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'storeUser'])->name('admin.store');
    Route::get('/admin/edit/{id}', [AdminController::class, 'editUser'])->name('admin.edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'updateUser'])->name('admin.update');
    Route::get('/admin/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.delete');
    /**
     * -------------------------------- Location ROUTES ------------------------------ *
     * --------------------------------------------------------------------------- *
     */
    Route::resource('locations', LocationController::class);








    Route::get('/admin/profile', [ProfileController::class, 'adminProfile'])->name('user.profile');
    Route::put('/admin/profile/update',[ProfileController::class, 'updateProfile'])->name('user.profile.update');

});
