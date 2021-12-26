<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('public_website.index');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get("add_admin",[AdminController::class,'create']);
    Route::post("add_admin/store",[AdminController::class,'store'])->name('admin.store');
    // Route::get("admin_movie",[MovieController::class,'index'])->name('movie.index');
    // Route::get("movie/edit/{id}",[MovieController::class,'edit'])->name('movie.edit');
    // Route::post("movie/update/{id}",[MovieController::class,'update'])->name('movie.update');
    // Route::get("movie/destroy/{id}",[MovieController::class,'destroy'])->name('movie.destroy');
    

});
