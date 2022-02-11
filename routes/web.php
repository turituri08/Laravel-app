<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\UserRegisterController;

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

// Route::get('user/{id}', function(int $id){
//     return $id;
//     // whereでパスパラメーターの値を縛る正規表現を指定できる
// })->where(['id' => '[0-9]+'])->name('user');

Route::get('/user/register/complete', function(){
    return view('user.register.complete');
})->name('user.register.complete');

Route::get('/user/register{complete?}', [UserRegisterController::class, 'create'])->name('user.register.create');
Route::post('/user/register/store', [UserRegisterController::class, 'store'])->name('user.register.store');

// Route::fallback(function(){
//     return '想定外のurlが送信されました';
// });