<?php

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




/* Rotte catalogo */

Route::get('/catalog', 'PublicController@showCatalog')
        ->name('catalog');

Route::post('/catalog', 'LocatarioController@showFilteredCatalog')
        ->name('catalog.filtered');

Route::get('/catalog/details/{offerId}', 'PublicController@showDetails')
        ->name('details');

/* Rotte faq */
Route::get('/faqs', 'PublicController@showFaqs')
        ->name('faqs');

/* Rotte account */
Route::get('/account', 'UserController@index')
        ->name('utente');

/* Rotte locatore */
Route::get('/offerview', 'LocatoreController@showOfferList')
        ->name('offerview');           

/* Rotte view statiche */
Route::view('/', 'home')
        ->name('home');

Route::view('/rules', 'rules')
        ->name('rules');

// Rotte per l'autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

// Rotte per la registrazione
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');

// Rotta per la chat
Route::view('/chat', 'chat')
        ->name('chat');

