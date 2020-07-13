<?php

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
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function(){


    Route::prefix('/home')->group(function (){
        //Home Route
        Route::get('/', 'HomeController@index')->name('home');

        /**
         * Routes Animals
         */


        /**
         * Routes Raw Materials
         */
        Route::prefix('raw-materials')->group(function (){

            Route::get('', 'RawMaterials@index')->name('homeRawMaterials');
            Route::get('/create', 'RawMaterials@create')->name('createRawMaterials');
            Route::post('/save', 'RawMaterials@save')->name('saveRawMaterials');
            Route::post('/delete', 'RawMaterials@delete')->name('deleteRawMaterials');


        });


        /**
         * Routes diets
         */


    });




});


