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




/* Rotte catalogo*/

Route::get('/catalog', 'PublicController@showCatalog')
        ->name('catalog');

Route::post('/catalog', 'LocatarioController@showFilteredCatalog')
        ->name('catalog.filtered');

Route::get('/catalog/details/{offerId}', 'PublicController@showDetails')
        ->name('details');

/*Rotte faq*/    
Route::get('/faqs', 'PublicController@showFaqs')
        ->name('faqs');

/*Rotte account*/

Route::view('/account', 'account')
        ->name('utente')->middleware('auth');

Route::get('/profile', 'RegisteredUserController@showProfile')
        ->name('profile')->middleware('auth');

Route::get('/profile/update', 'RegisteredUserController@showUpdateProfileForm')
        ->name('profile.updateview');

Route::post('/profile/update', 'RegisteredUserController@updateProfile')
        ->name('profile.update');

/* Rotte lista offerte Locatore*/
Route::get('/offerview', 'LocatoreController@showOfferList')
        ->name('offerview');

Route::get('/offerview/accept/{opzioneId}', 'LocatoreController@acceptOffer')
        ->name('offerview.accept');

Route::get('/offerview/delete/{offerId}', 'LocatoreController@deleteOffer')
        ->name('offerview.delete');

/* Rotte lista offerte Locatario*/

Route::get('/catalog/details/optioned/{offerId}', 'LocatarioController@optionedOffer')
        ->name('details.option');

Route::get('/optionedview', 'LocatarioController@showOptionedList')
        ->name('optionedview');

Route::get('/optionedview/delete/{offerId}', 'LocatarioController@deleteOption')
        ->name('optionedview.delete');

/* Rotte gestione faq Admin*/

Route::get('/faqview', 'AdminController@showFaqList')
        ->name('faqview');

Route::get('/faqview/delete/{faqId}', 'AdminController@deleteFaq')
        ->name('faqview.delete');

// Rotte per la form delle faq
Route::get('/faqview/insert', 'AdminController@showInsertFaqForm')
        ->name('faqview.insertview');

Route::post('/faqview/insert', 'AdminController@insertFaq')
        ->name('faq.insert');

// Rotte per la modifica delle faq
Route::get('/faqview/update/{faqId}', 'AdminController@showUpdateFaqForm')
        ->name('faqview.updateview');

Route::post('/faqview/update', 'AdminController@updateFaq')
        ->name('faq.update');

// Rotte per le statistiche
Route::get('/stats', 'AdminController@showStatsPage')
        ->name('stats');

Route::post('/stats', 'AdminController@showFilteredStats')
        ->name('stats.filtered');

/*Rotte view statiche*/
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

// Rotte per la chat
Route::get('/chat', 'RegisteredUserController@showChat')
        ->name('chat');

Route::post('/chat/unread', 'RegisteredUserController@updateUnreadMessages')
        ->name('chat.unread');

Route::post('/chat/message', 'RegisteredUserController@saveMessage')
        ->name('chat.message');

// Rotte per la form delle offerte
Route::get('/offerview/insert', 'LocatoreController@showInsertOfferForm')
        ->name('offer.insertview');

Route::post('/offerview/insert', 'LocatoreController@insertOffer')
        ->name('offer.insert');

// Rotte per la modifica delle offerte
Route::get('/offerview/update/{offerId}', 'LocatoreController@showUpdateOfferForm')
        ->name('offer.updateview');

Route::post('/offerview/update', 'LocatoreController@updateOffer')
        ->name('offer.update');

/*Rotta contratto*/
Route::get('/contract/{optionId}','RegisteredUserController@showContract')
        ->name('contract');
