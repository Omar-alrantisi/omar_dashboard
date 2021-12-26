<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ImageController;

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
    return view('publicSite.index');
});
Route::get('manage_user', function () {
    return view('backend.manage_user');
})->name('manage_user');

Route::get('manage_admin', function () {
    return view('backend.manage_admin');
})->name('manage_admin');

Route::get('manage_owner', function () {
    return view('backend.manage_owner');
})->name('manage_owner');

Route::get('manage_category', function () {
    return view('backend.manage_category');
})->name('manage_category');

Route::get('manage_comment', function () {
    return view('backend.manage_comment');
})->name('manage_comment');
//Admin Route
Route::get("add_admin",[AdminController::class,'backendcreate']);
Route::post("add_admin/store",[AdminController::class,'backendstore'])->name('admin.store');
Route::get("/admin",[AdminController::class,'backendindex'])->name('admin.index');
Route::get("admin/edit/{id}",[AdminController::class,'backendedit'])->name('admin.edit');
Route::post("admin/update/{id}",[AdminController::class,'backendupdate'])->name('admin.update');
Route::get("admin/destroy/{id}",[AdminController::class,'backenddestroy'])->name('admin.destroy');

//Category Route
Route::get("add_category",[CategoryController::class,'backendcreate']);
Route::post("add_category/store",[CategoryController::class,'backendstore'])->name('category.store');
Route::get("/category",[CategoryController::class,'backendindex'])->name('category.index');
Route::get("category/edit/{id}",[CategoryController::class,'backendedit'])->name('category.edit');
Route::post("category/update/{id}",[CategoryController::class,'backendupdate'])->name('category.update');
Route::get("category/destroy/{id}",[CategoryController::class,'backenddestroy'])->name('category.destroy');

//Owner Route
Route::get("add_owner",[OwnerController::class,'backendcreate']);
Route::post("add_owner/store",[OwnerController::class,'backendstore'])->name('owner.store');
Route::get("/owner",[OwnerController::class,'backendindex'])->name('owner.index');
Route::get("owner/edit/{id}",[OwnerController::class,'backendedit'])->name('owner.edit');
Route::post("owner/update/{id}",[OwnerController::class,'backendupdate'])->name('owner.update');
Route::get("owner/destroy/{id}",[OwnerController::class,'backenddestroy'])->name('owner.destroy');


//User Route
Route::get("add_user",[UserController::class,'backendcreate']);
Route::post("add_user/store",[UserController::class,'backendstore'])->name('user.store');
Route::get("/user",[UserController::class,'backendindex'])->name('user.index');
Route::get("user/edit/{id}",[UserController::class,'backendedit'])->name('user.edit');
Route::post("user/update/{id}",[UserController::class,'backendupdate'])->name('user.update');
Route::get("user/destroy/{id}",[UserController::class,'backenddestroy'])->name('user.destroy');

//Service Route
Route::get("add_service",[ServiceController::class,'backendcreate']);
Route::post("add_service/store",[ServiceController::class,'backendstore'])->name('service.store');
Route::get("/service",[ServiceController::class,'backendindex'])->name('service.index');
Route::get("service/edit/{id}",[ServiceController::class,'backendedit'])->name('service.edit');
Route::post("service/update/{id}",[ServiceController::class,'backendupdate'])->name('service.update');
Route::get("service/destroy/{id}",[ServiceController::class,'backenddestroy'])->name('service.destroy');

//image Route
Route::get("add_image",[ImageController::class,'backendcreate']);
Route::post("add_image/store",[ImageController::class,'backendstore'])->name('image.store');
Route::get("/image",[ImageController::class,'backendindex'])->name('image.index');
Route::get("image/edit/{id}",[ImageController::class,'backendedit'])->name('image.edit');
Route::post("image/update/{id}",[ImageController::class,'backendupdate'])->name('image.update');
Route::get("image/destroy/{id}",[ImageController::class,'backenddestroy'])->name('image.destroy');