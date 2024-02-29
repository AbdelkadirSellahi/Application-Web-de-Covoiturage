<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'checkUserType']);

Route::get('/inscrireP', function () {
    return view('inscrireP');
})->name('inscrirep');

Route::get('/inscrireC', function () {
    return view('inscrireC');
})->name('inscrirec');

Route::resource('trajets', 'TrajetController');

Route::resource('profiles', 'ProfileController');

Route::resource('factures', 'FactureController');

Route::resource('tauxdegains', 'TauxdegainsController');

Route::resource('reservations', 'ReservationController');

Route::get('reserv', 'ReservationController@show')->name('reserv');

Route::resource('demandeinscriptions', 'DemandeinscriptionController');

Route::resource('users', 'UserController');

Route::post('/delete', 'deleterController@delete')->name('delete');

// Route::delete('users/{id}', 'RegisterController@destroy')->name('profiledelet');
// // //Route::resource('passagers', 'PassagerController');
// // //Route::get('/search', 'SearchController@search')->name('search');

// // Route::delete('users/Auth::user()->id', function ($id) {

// // });

Route::resource('feedbacks', 'FeedbackController');

Route::resource('admins', 'AdminController');

Auth::routes();

Route::get('/Authentification', function () {
    return view('Authentification');
})->name('Authentification');

Route::get('/passager', function () {
    return view('passager');
})->name('passager');

// Route::get('/admin', function () {
//     return view('admin');
// })->name('admin');

// Route::get('/add/$item->id', function () {
//     return view('add');
// })->name('add');