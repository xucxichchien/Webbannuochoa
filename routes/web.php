<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomAuthController;
/*use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;*/
use App\Http\Controllers\TemplateController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get("/",[TemplateController::class,"index"]);
/*
//Route::view('/','insert');
route::post('insertData',[ProductController::class,'insert']);
route::get('/',[ProductController::class,'readdata']);
//route::view('update','update');
route::get('updatedelete',[ProductController::class,'updateordelete']);
route::get('updatedata',[ProductController::class,'update']);
route::get('/login',[CustomAuthController::class,'login']);
route::get('/registration',[CustomAuthController::class,'registration']);
route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
route::get('/dashboard',[CustomAuthController::class,'dashboard']);
route::get('/logout',[CustomAuthController::class,'logout']);*/
?>

