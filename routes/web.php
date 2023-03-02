<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConversationsController;

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

Auth::routes();

Route::get('/home', [ConversationsController::class, 'index'])->name('home');
Route::get('/conversations',[ConversationsController::class, 'index'])->name('conversations');
Route::get('/conversations/{user}', [ConversationsController::class, 'show'])->name('conversations.show');
Route::post('/conversations/{user}', [ConversationsController::class, 'store']);
