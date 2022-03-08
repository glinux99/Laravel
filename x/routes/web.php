<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BanqueController;

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
    return view('acceuil');
});
Route::get('/admin', function () {
    return view('admin.admin');
})->name('administrateur');
Route::get('/caissier', function () {
    return view('caissier.caissier');
})->name('administrateur');
Route::get('/client', function () {
    return view('client.client');
})->name('client');
Route::get('/login', [ BanqueController::class, 'login'])->name('login');
Route::get('/Clients/{data}', [ BanqueController::class, 'accounts']);
Route::get('/solde-all', [ BanqueController::class, 'solde_banque']);
Route::get('/add-agents-or-clients', [ BanqueController::class, 'add_agents']);
Route::get('/delete_add_desactivate_clients_or_agent', [ BanqueController::class, 'alter_clients_and_agents']);
//Route::get('/products', [ etudiantController::class,'index']);
