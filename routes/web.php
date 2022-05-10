<?php

use App\Models\loket;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoketController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PanelController;


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

// Route::redirect('/', 'admin/home');
// Route::get('/', function () {return view('HALAMANMU');})->name('welcome');
Route::get('/', [LoketController::class, 'index']); // Dashboard
Route::get('/login', 'Auth\LoginController@ifLogin')->name('login'); // Dashboard
Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
});
Route::group(['middleware' => ['auth'], 'prefix' => 'loket', 'as' => 'loket.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/', [LoketController::class, 'index']);
    Route::get('/dashboard/data/{loket}', [DashboardController::class, 'dataTabel']);
    Route::post('/dashboard/data/update/', [DashboardController::class, 'update']);
    Route::post('/dashboard/data/panggil/', [DashboardController::class, 'panggil']);
});
Route::post('/pengunjung/tambah', [LoketController::class, 'store']);
Route::post('/antrian/pesan/', [AntrianController::class, 'store']);
Route::get('/pengunjung/tanggal/', [AntrianController::class, 'realTime']);
Route::get('/pengunjung/table/', [LoketController::class, 'table']);
Route::get('/antrian/cetak_pdf/', [AntrianController::class, 'cetak']);
Route::get('/antrian/cek_antrian/', [AntrianController::class, 'cekAntrian']);
Route::get('/panel', [PanelController::class, 'index']);



//alur (set_interval) ajax GET -> Controller QUERY -> DB -> Controller QUERY -> Ajax -> View