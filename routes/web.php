<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\BailleurController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\PostulerController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\TdrController;
use App\Http\Controllers\TdrsController;
use App\Http\Controllers\TypeController;
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

Route::get('/', function () {
    return view('pages/users/login');
});
Route::resource('client',ClientController::class)->middleware('App\Http\Middleware\Auth_middleware');
Route::resource('accueil', AccueilController::class)->middleware('App\Http\Middleware\Auth_middleware');
Route::resource('pays', PaysController::class)->middleware('App\Http\Middleware\Auth_middleware');
Route::resource('tdr', TdrController::class)->middleware('App\Http\Middleware\Auth_middleware');
Route::resource('bailleur', BailleurController::class);
Route::resource('expert', ExpertController::class)->middleware('App\Http\Middleware\Auth_middleware');
Route::resource('poste', PosteController::class)->middleware('App\Http\Middleware\Auth_middleware');
Route::resource('type', TypeController::class)->middleware('App\Http\Middleware\Auth_middleware');
Route::resource('responsable', ResponsableController::class)->middleware('App\Http\Middleware\Auth_middleware');
Route::resource('postuler', PostulerController::class)->middleware('App\Http\Middleware\Auth_middleware');
Route::resource('cabinet', CabinetController::class)->middleware('App\Http\Middleware\Auth_middleware');
Route::get('userindex',[TdrsController::class,'userindex'])->name('userindex');
Route::post('login',[TdrsController::class,'login'])->name('login');
Route::post('registreuser',[TdrsController::class,'registreuser'])->name('registreuser');
Route::get('ajouter',[TdrsController::class,'ajouter'])->name('ajouter');
Route::get('post',[TdrsController::class,'post'])->name('post');
Route::get('index',[TdrsController::class,'index'])->name('index');
Route::get('update',[TdrsController::class,'update'])->name('update');
Route::post('store',[TdrsController::class,'store'])->name('store');
Route::get('voir/{id}',[TdrsController::class,'voir'])->name('voir');
Route::get('detail/{id}',[TdrsController::class,'detail'])->name('detail');
Route::get('postulerindex',[TdrsController::class,'postulerindex'])->name('postulerindex');
Route::get('forgetpassword',[TdrsController::class,'forgetpassword'])->name('forgetpassword');
Route::post('postulerstore',[TdrsController::class,'postulerstore'])->name('postulerstore');
Route::post('restorpassword',[TdrsController::class,'restorpassword'])->name('restorpassword');
Route::get('connexion',[TdrsController::class,'connexion'])->name('connexion');
