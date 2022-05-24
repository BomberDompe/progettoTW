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

Route::get('/catalog/dettagli', 'PublicController@showDetails')
        ->name('details');

/*Rotte faq*/
Route::get('/faq', 'PublicController@showFaq')
        ->name('faqs');

/*Rotte view statiche*/
Route::view('/', 'home')
        ->name('home');
Route::view('/rules', 'rules')
        ->name('rules');

