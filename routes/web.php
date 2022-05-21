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


Route::view('/', 'home')
        ->name('home');

Route::get('/catalog', 'PublicController@showCatalog')
        ->name('catalog');

Route::get('/faq', 'PublicController@showFaq')
        ->name('faq');

Route::view('/rules', 'rules')
        ->name('rules');

Route::view('/', 'auth/login')
        ->name('login');

Route::view('/', 'auth/register')
        ->name('register');
