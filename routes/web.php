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
    return view('welcome');
});
Route::get('/offres', 'offreController@index');
Route::get('/offres/{id}','offreController@show')->name('offres.show');
/*route crud*/ 

Route::get('/crudoffre','offreController@crud');

// Populate Data in Edit Modal Form
Route::get('offre/{offre_id?}', 'offreController@show');

//create New Product
Route::post('offre', 'offreController@store');
Route::post('crudoffre', 'offreController@store');

// update Existing Product
Route::put('offre/{offre_id}', 'offreControllerr@update');

// delete product
Route::delete('offre/{offre_id}', 'offreController@destroy');

//create form
Route::get('/offre/create', 'offreController@create')->name('offre.create');

