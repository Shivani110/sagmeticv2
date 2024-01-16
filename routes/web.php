<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminViewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

////////////// ADMIN VIEW ROUTES///////////
Route::group(['middleware'=> 'role:1,2'],function(){
    Route::view('/admin/home','admin.index')->name('admin.index');
    Route::view('/admin/jobs','admin.jobs');
    Route::view('/admin/interview', 'admin.interview');
    Route::view('/admin/add-jobs','admin.add-jobs');
    Route::view('/admin/applied/wordpress','admin.applied');
    Route::view('/admin/applied/wordpress/applicantid=1','admin.applicant-details');
    Route::view('/admin/applied/wordpress/applicantid=1/status','admin.applicant-status');  
    Route::get('/admin/jobs/{title}/details/{id}',[AdminViewsController::class,'jobDetails'])->name('job.details');  
});

//////////////// ADMIN LOGIN ROUTES ///////////
Route::get('/admin',[AdminViewsController::class,'loginView'])->name('admin.login');
Route::post('/admin/login',[AdminController::class,'loginUser']);
Route::get('/admin/logout',[AdminController::class,'logoutUser']);

/////// ADMIN SPECIAL PERMISSIONS ROUTES /////////// 
Route::group(['middleware'=>'role:1'],function(){
    Route::post('/add-user',[AdminController::class,'addUser']);
    Route::post('/add-job',[AdminController::class,'addJob']);
    Route::view('/admin/adduser','admin.add-user');
    Route::view('/admin/manageuser','admin.manage-users');
});

