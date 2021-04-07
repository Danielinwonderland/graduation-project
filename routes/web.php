<?php

use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\Tasks;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\CategoriesController as CmsCategoriesController;
use App\Http\Controllers\Cms\TasksController as CmsTasksController;
use App\Http\Controllers\Cms\UsersController as CmsUsersController;



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

Route::get('/contacts', [StaticPagesController::class, 'contacts'])->name('contacts');
Route::get('/about', [StaticPagesController::class, 'about'])->name('about');

Route::get('/tasks', [TasksController::class, 'index'])->name('tasks_list');
Route::get('/users', [UsersController::class, 'index']);

Route::resource('/admin/categories', CmsCategoriesController::class);
Route::resource('/admin/tasks', CmsTasksController::class);
Route::resource('/admin/users', CmsUsersController::class);