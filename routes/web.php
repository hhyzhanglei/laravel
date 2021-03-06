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
use App\Http\Controllers\Api\TestController;

Route::any('/', function () {
    return view('welcome');
});
Route::group([
    'namespace' => 'Api'
],function(\Illuminate\Routing\Router $router){
    $router->any('add',[TestController::class,'add']);
    $router->any('addJob',[TestController::class,'addJob']);
});
