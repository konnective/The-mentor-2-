<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [DashboardController::class, 'index'])->name('admin.dash');
Route::get('/pros', [ProductController::class, 'products'])->name('admin.pros');
Route::get('/addPro', [ProductController::class, 'addProduct'])->name('admin.addPro');
Route::post('/createPro', [ProductController::class, 'createProduct'])->name('admin.createPro');
Route::get('/editPro/{id}', [ProductController::class, 'editProduct'])->name('admin.editPro');
Route::post('/updatePro', [ProductController::class, 'updateProduct'])->name('admin.updatePro');



Route::post('/project/store', [ProductController::class, 'store'])->name('project.store');
Route::post('/project/update', [ProductController::class, 'update'])->name('project.update');

Route::get('createLink', [MeetController::class, 'createLink']);
Route::get('test', [MeetController::class, 'test']);
Route::get('makeToken', [MeetController::class, 'makeToken']);

Route::get('/home', [FrontController::class, 'index']);
