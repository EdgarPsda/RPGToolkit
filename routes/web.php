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

Route::namespace('Dashboard')->group(function () {

    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard.index');

    Route::get('/dashboard/heros', 'HeroController@index')
        ->name('heros.index');

    Route::get('/dashboard/monsters', 'MonsterController@index')
        ->name('monsters.index');
});
