<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [DashboardController::class, 'index'])->name('admin.dash');
// Route::get('/pros', [ProductController::class, 'products'])->name('admin.pros');
// Route::get('/addPro', [ProductController::class, 'addProduct'])->name('admin.addPro');
// Route::post('/createPro', [ProductController::class, 'createProduct'])->name('admin.createPro');
// Route::get('/editPro/{id}', [ProductController::class, 'editProduct'])->name('admin.editPro');
// Route::get('/deletePro/{id}', [ProductController::class, 'deleteProduct'])->name('admin.deletePro');
// Route::post('/updatePro', [ProductController::class, 'updateProduct'])->name('admin.updatePro');



Route::get('/project/add', [ProjectController::class, 'add'])->name('project.add');
Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
Route::post('/project/update', [ProjectController::class, 'update'])->name('project.update');

//blog section
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blog/add', [BlogController::class, 'add'])->name('blog.add');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::post('/blog/update', [BlogController::class, 'update'])->name('blog.update');
Route::post('/blog/delete', [BlogController::class, 'delete'])->name('blog.delete');

//leads section
Route::get('/leads', [LeadController::class, 'index'])->name('leads');
Route::get('/lead/add', [LeadController::class, 'add'])->name('lead.add');
Route::get('/lead/edit/{id}', [LeadController::class, 'edit'])->name('lead.edit');
Route::post('/lead/store', [LeadController::class, 'store'])->name('lead.store');
Route::post('/lead/update', [LeadController::class, 'update'])->name('lead.update');
Route::post('/lead/delete', [LeadController::class, 'delete'])->name('lead.delete');


Route::get('createLink', [MeetController::class, 'createLink']);
Route::get('test', [MeetController::class, 'test']);
Route::get('makeToken', [MeetController::class, 'makeToken']);

Route::get('/home', [FrontController::class, 'index']);
