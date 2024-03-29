<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TableController;


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

Route::get('/register',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'register'])->name('register');


Route::get('/login',function(){
    return redirect('/');
});
Route::post('/login',[AuthController::class,'login'])->name('login');



Route::get('/',[AuthController::class,'loadLogin']);
Route::get('/logout',[AuthController::class,'logout']);


// ********** Super Admin Routes *********
Route::group(['prefix' => 'super-admin','middleware'=>['web','isSuperAdmin']],function(){
    Route::get('/dashboard',[SuperAdminController::class,'dashboard']);
    Route::get('/users',[SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::get('/manage-role',[SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',[SuperAdminController::class,'updateRole'])->name('updateRole');
});

// ********** Sub Admin Routes *********
Route::group(['prefix' => 'sub-admin','middleware'=>['web','isSubAdmin']],function(){
    Route::get('/dashboard',[SubAdminController::class,'dashboard']);
});

// ********** Admin Routes *********
Route::group(['prefix' => 'admin','middleware'=>['web','isAdmin']],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard']);
});

// ********** User Routes *********
Route::group(['middleware'=>['web','isUser']],function(){
    Route::get('/dashboard',[UserController::class,'dashboard']);
});

//** new for form*/
#Route::get('/',[DashboardController::class,'dashboardIndex']);
Route::post('datainsert',[DashboardController::class,'DataInsert'])->name('insertData');

//** new show data on admin form*/
Route::get('/admin/dashboard', [AdminController::class, 'dataAndPdf'])->name('admin.dashboard');
#Route::get('/admin/dashboard', [AdminController::class, 'dataAndPdf'])->name('admin.table');


Route::get('admin/table', [AdminController::class, 'showTable'])->name('admin.showTable');



#Route::get('/admin/dashboard', [AdminController::class, 'dataAndPdf0'])->name('admin.dashboard');
Route::get('/dashboard-o',[AdminController::class,'dashboard_o'])->name('admin_submit');


Route::get('/admin/dashboard-o', function () {return view('admin/dashboard-o');});
