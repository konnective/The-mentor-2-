<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
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
Route::get('/', function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dash');





})->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dash')->middleware('auth');



Route::get('/login', [DashboardController::class, 'login'])->name('login');
Route::post('/login_check', [DashboardController::class, 'loginCheck'])->name('login_check');
Route::get('/register', [DashboardController::class, 'register'])->name('register');
Route::post('/registration', [DashboardController::class, 'registration'])->name('registration');
Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

Route::get('/project/add', [ProjectController::class, 'add'])->name('project.add');
Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
Route::post('/project/update', [ProjectController::class, 'update'])->name('project.update');

//blog section
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs')->middleware('auth');
Route::get('/blog/add', [BlogController::class, 'add'])->name('blog.add')->middleware('auth');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store')->middleware('auth');
Route::post('/blog/update', [BlogController::class, 'update'])->name('blog.update')->middleware('auth');
Route::post('/blog/delete', [BlogController::class, 'delete'])->name('blog.delete')->middleware('auth');

//leads section
Route::get('/leads', [LeadController::class, 'index'])->name('leads')->middleware('auth');
Route::get('/lead/add', [LeadController::class, 'add'])->name('lead.add')->middleware('auth');
Route::get('/lead/edit/{id}', [LeadController::class, 'edit'])->name('lead.edit')->middleware('auth');
Route::post('/lead/store', [LeadController::class, 'store'])->name('lead.store')->middleware('auth');
Route::post('/lead/update', [LeadController::class, 'update'])->name('lead.update')->middleware('auth');
Route::post('/lead/delete', [LeadController::class, 'delete'])->name('lead.delete')->middleware('auth');

//career section
Route::get('/careers', [CareerController::class, 'index'])->name('careers')->middleware('auth');
Route::get('/career/add', [CareerController::class, 'add'])->name('career.add')->middleware('auth');
Route::get('/career/view/{id}', [CareerController::class, 'view'])->name('career.view')->middleware('auth');
Route::get('/career/edit/{id}', [CareerController::class, 'edit'])->name('career.edit')->middleware('auth');
Route::post('/career/store', [CareerController::class, 'store'])->name('career.store')->middleware('auth');
Route::post('/career/update', [CareerController::class, 'update'])->name('career.update')->middleware('auth');
Route::post('/career/delete', [CareerController::class, 'delete'])->name('career.delete')->middleware('auth');


Route::get('createLink', [MeetController::class, 'createLink']);
Route::get('test', [MeetController::class, 'test']);
Route::get('makeToken', [MeetController::class, 'makeToken']);

Route::get('/home', [FrontController::class, 'index']);