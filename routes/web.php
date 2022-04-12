<?php

use App\Http\Controllers\Backend\ChangePassword;
use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\MenuController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('welcome');
});
Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/employees.index');
Route::resource('users', UserController::class);
Route::resource('countries', CountryController::class);
Route::resource('states', StateController::class);
Route::resource('cities', CityController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('menu', MenuController::class);
Route::middleware('is_admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/',[AdminController::class,'index']);
    Route::resource('/departments.index', AdminController::class);

});
});


Route::post('users/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('users.change.password');

Route::get('{any}', function () {
    return view('employees.index');
})->where('any', '.*');
