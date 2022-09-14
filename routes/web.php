<?php

use App\Http\Controllers\CryptoAssetController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
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

//CryptoAssets controller
Route::get('/', function (){
    return view('welcome');
});

Route::get('/home', [CryptoAssetController::class, 'index'])
    ->name('home')->middleware('auth');

Route::get('/assets/{cryptoAsset}', [CryptoAssetController::class, 'show'])
    ->middleware('auth');


//Wallet controller
Route::get('/wallet', [WalletController::class, 'index'])
    ->name('wallet')->middleware('auth');

Route::post('/wallet/buy/{cryptoAsset}', [WalletController::class, 'buy'])->middleware('auth');

Route::post('/wallet/sell/{cryptoAsset}', [WalletController::class, 'sell'])->middleware('auth');

Route::post('/wallet/favorite/{cryptoAssetUser}', [WalletController::class, 'favorite'])->middleware('auth');

//Transactions Controller
Route::get('/transactions/', [TransactionController::class, 'index'])
    ->name('transactions')->middleware('auth');

Route::post('/transactions/{cryptoAsset}/buy', [TransactionController::class, 'store'])->middleware('auth');

Route::post('/transactions/{cryptoAsset}/sell', [TransactionController::class, 'store'])->middleware('auth');


require __DIR__.'/auth.php';
