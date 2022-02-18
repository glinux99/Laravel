<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/developpment', function () {
    return view('developpmnt');
})->name("developpement");
Route::get('/informatque', function () {
    return view('informatique');
})->name("info");

Route::get('/menu', function () {
    return view('menu');
});
Route::get('/etudiant', function () {
    return view('etudiant');
})->name("new_et");
Route::post('/enreg', function (Request $resquest) {
    \DB:: table('etudiante')->insert([
        'noms'=>$resquest->noms,
        'age'=>$resquest->age
    ]);
})->name("enreg");