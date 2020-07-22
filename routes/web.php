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
        Route::prefix('animals')->group(function (){

        });

        /**
         * Routes Stages
         */
        Route::prefix('stages')->group(function (){

            Route::get('', 'StagesController@index')->name('homeStages');
            Route::get('/create', 'StagesController@create')->name('createStage');
            Route::post('/save', 'StagesController@save')->name('saveStage');
            Route::post('/delete', 'StagesController@delete')->name('deleteStage');
        });

        /**
         * Routes Race
         */
        Route::prefix('race')->group(function (){

            Route::get('', 'RaceController@index')->name('raceHome');
            Route::get('/create', 'RaceController@create')->name('createRace');
            Route::post('/save', 'RaceController@save')->name('saveRace');
            Route::post('/delete', 'RaceController@delete')->name('deleteRace');
        });


        /**
         * Routes LiveStocks
         */
        Route::prefix('livestocks')->group(function (){

            Route::get('', 'LiveStockController@index')->name('homeLivestocks');
            Route::get('/create', 'LiveStockController@create')->name('createLivestock');
            Route::post('/save', 'LiveStockController@save')->name('saveLivestock');
            Route::post('/delete', 'LiveStockController@delete')->name('deleteLivestock');
        });

        /**
         * Routes Batches
         */
        Route::prefix('batches')->group(function (){

            Route::get('', 'BatchController@index')->name('homeBatches');
            Route::get('/create', 'BatchController@create')->name('createBatches');
            Route::post('/save', 'BatchController@save')->name('saveBatches');
            Route::post('/delete', 'BatchController@delete')->name('deleteBatches');
        });


        /**
         * Routes Purposes
         */
        Route::prefix('/purposes')->group(function (){


            Route::get('', 'PurposeController@index')->name('purposeHome');
            Route::get('/create', 'PurposeController@create')->name('createPurpose');
            Route::post('/save', 'PurposeController@save')->name('savePurpose');
            Route::post('/delete', 'PurposeController@delete')->name('deletePurpose');


        });


        /**
         * Routes Raw Materials
         */
        Route::prefix('raw-materials')->group(function (){

            Route::get('', 'RawMaterials@index')->name('homeRawMaterials');
            Route::get('/create', 'RawMaterials@create')->name('createRawMaterials');
            Route::get('/show/json/{id}', 'RawMaterials@showDataJson')->name('showDataJson');
            Route::post('/save', 'RawMaterials@save')->name('saveRawMaterials');
            Route::post('/delete', 'RawMaterials@delete')->name('deleteRawMaterials');
        });

        /**
         * Routes diets
         */
        Route::prefix('diets')->group(function (){

            Route::get('', 'DietsController@index')->name('homeDiets');
            Route::get('/create', 'DietsController@create')->name('createDiets');
            Route::post('/save', 'DietsController@save')->name('saveDiets');
            Route::get('/show/{id}', 'DietsController@show')->name('showDiet');

        });


    });




});


