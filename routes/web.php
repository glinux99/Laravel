<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\SignUp;
use App\Http\Middleware\SignOn;
use App\Http\Controllers\BanqueController;
use App\Http\Controllers\LocaleController;
use App\Http\Middleware\LocaleMiddleware;
use App\Http\Controllers\pdfController;

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
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
    Route::post('/calcul_money', function (Request $request){
        $montant= $request->montant;
        $from_conv = $request->from_conv;
        $to_conv =$request->to_conv;
        $result = $montant*($from_conv/$to_conv);
        return view('acceuil', compact('result'));
    });
    Route::get('/', function () {
        return view('acceuil');
    });
    Route::get('/statistiques', function () {
        return view('statistiques');
    });
    Route::get('/mon_epargne', function () {
        return view('mon_epargne');
    });
    Route::get('/admin', function () {
        return view('admin.admin');
    })->name('administrateur')
    ->middleware(SignUp::class);
    Route::get('/caissier', function () {
        return view('caissier.caissier');
    })->name('caissier')
    ->middleware(SignUp::class);
    Route::get('/client', function () {
        return view('client.client');
    })->name('client')
    ->middleware(SignUp::class);
    //pour lesessaie
    Route::get('/lang_session', function(Request $request){
        session()->put('lang', $request->langue);
        \App::setLocale( $request->langue);
        // dd(\App::getLocale());
        return back();
        
    });
    Route::get('/pdf', [ pdfController::class, 'index']);
    Route::post('/send_message', [ BanqueController::class, 'send_message']);
    Route::get('/message/{dest}', [ BanqueController::class, 'message']);
    Route::post('/rapport', [ BanqueController::class, 'rapport']);
    Route::get('/transaction', [ BanqueController::class, 'transaction']);
    Route::get('/desactive/{id}', [ BanqueController::class, 'desactive']);
    Route::get('/active/{id}', [ BanqueController::class, 'active']);
    Route::get('/delete/{id}', [ BanqueController::class, 'delete']);
    Route::get('/alter_account', [ BanqueController::class, 'alter_account']);
    Route::post('/alter_account', [ BanqueController::class, 'alter_account']);
    Route::post('/inscription', [ BanqueController::class, 'connection']);
    Route::post('/connection', [ BanqueController::class, 'connection']);
    Route::get('/login', [ BanqueController::class, 'login'])->name('login')->middleware(SignOn::class);
    Route::get('/Clients/{data}', [ BanqueController::class, 'accounts']);
    Route::get('/solde-all', [ BanqueController::class, 'solde_banque']);
    Route::get('/add-agents-or-clients', [ BanqueController::class, 'add_agents']);
    Route::post('/add_agent_submit',[ BanqueController::class, 'add_agent_submit']);
    Route::get('/logout', [ BanqueController::class, 'logout'])->name('logout');
    Route::post('/update', [ BanqueController::class, 'update']);
    Route::post('/verifier_solde', [ BanqueController::class, 'verifier_solde']);
    Route::post('/depot_argent', [ BanqueController::class, 'depot_argent']);
    Route::post('/retrait_argent', [ BanqueController::class, 'retrait_argent']);
    Route::post('/virement', [ BanqueController::class, 'virement']);
    Route::get('/delete_add_desactivate_clients_or_agent', [ BanqueController::class, 'alter_clients_and_agents']);
    //Route::get('/products', [ etudiantController::class,'index']);

// Route:: fallback(function(){
//     return view('acceuil');
// });