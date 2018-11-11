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
Auth::routes();
/// Base routes ///
Route::get('/', 'HomeController@index')->name('home');
Route::get('/us', 'HomeController@us')->name('us');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/home', 'HomeController@index');
Route::get('/profile', 'HomeController@profile')->name('profile');

/// post routes ///
// ** Route::resource('post', 'PostController');
/* ||post *** Non-AuthRoute|| */
Route::prefix('post')->name('post.')->group(function () {
    Route::get('/', 'PostController@index')->name('index');
    /** ||post *** AuthRoute|| **/
    Route::middleware('auth')->group(function () {
        Route::get('/create', 'PostController@create')->name('create');
        Route::post('/create', 'PostController@store')->name('store');
        Route::get('/{post}/edit', 'PostController@edit')->name('edit');
        Route::put('/{post}/edit', 'PostController@update')->name('update');
        Route::delete('/{post}/edit', 'PostController@destroy')->name('destroy');
    //My Routes
        Route::get('/historial', 'PostController@historial')->name('history');
        Route::patch('/{post}/edit', 'PostController@toggle')->name('toggle');
        Route::get('/{post}/preview', 'PostController@preview')->name('preview');
    });
    Route::get('/{post}', 'PostController@show')->name('show');
});
/*  */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/migrate', function () {
        Artisan::call('migrate',[
            '--seed' => true,
        ]);
        //
    })->name('migrar');
    Route::get('/migrate/fresh', function () {
        Artisan::call('migrate');
        //
    })->name('fresh');
    Route::get('/migrate/refresh', function () {
        Artisan::call('migrate:refresh');
        //
    })->name('refresh');
    Route::get('/storage-link', function () {
        Artisan::call('storage:link');
        //
    })->name('refresh');
});
