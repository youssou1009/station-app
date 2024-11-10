<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\StationComp;
use App\Http\Livewire\Utilisateur;
use App\Http\Livewire\MesuresComp;
use App\Http\Livewire\ChangePassword;
use App\Http\Livewire\StationDetails;
use App\Http\Livewire\GraphComp;
use App\Http\Livewire\ProfilLangue;
use App\Http\Livewire\MapComp;
use App\Http\Livewire\ChercheurComp;
use App\Http\Livewire\Exemple;
use App\Http\Livewire\NotificationsDropdown;
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

// Route::get('/connexion', function () {
//     return view('layouts.master');
// });
Route::get('auth/login', function () {
    return view('auth.login');
});
Route::get('/faq', function () {
    return view('faq');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/stations", StationComp::class)->name("stations");
Route::get("/stations/{stationId}/mesures", MesuresComp::class)->name("stations.mesures");
Route::get('/stations/{stationId}/details', StationDetails::class)->name('stations.details');
Route::get('/stations/{stationId}/graphiques', GraphComp::class)->name('stations.graphiques');
Route::get('/change-password', ChangePassword::class)->name('change-password');
Route::get('/profile-langue', ProfilLangue::class)->name('profile-langue');
Route::get('/map', MapComp::class)->name('map');


Route::get('/chercheurs', ChercheurComp::class)->name('chercheurs');
Route::get('/notifications', NotificationsDropdown::class)->name('notifications');


Route::group([
    "middleware" => ["auth", "auth.admin"],
    'as' => 'admin.'
], function(){

    Route::group([
        "prefix" => "habilitations",
        'as' => 'habilitations.'
    ], function(){
        Route::get("/utilisateurs", Utilisateur::class)->name("users.index");
    });
    
});



// Route::get('/habilitations/utilisateurs', [App\Http\Controllers\UserController::class, 'index'])
// ->name('utilisateurs')
// ->middleware("auth.admin");
