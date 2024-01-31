<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminViewsController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\WebsiteController;
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


////////// WEBSITE FRONTEND ROUTES ////////////
Route::view('/','frontend.index'); 
Route::view('/careers','frontend.careers'); 
Route::view('/careers1','frontend.job-details1'); 
Route::get('/careers/{slug}/apply-success',[WebsiteController::class,'applySuccess']); 
Route::get('/careers/{slug}',[WebsiteController::class,'jobDetails']); 
Route::get('/careers/{slug}/application',[WebsiteController::class,'applyJobView']); 
Route::post('/careers/{slug}/application/apply',[WebsiteController::class,'applyJob']); 
Route::post('/file-upload',[WebsiteController::class,'uploadFile']); 
Route::get('/delete-file',[WebsiteController::class,'deleteFile']); 
Route::post('/contact-us-mail',[WebsiteController::class,'SendMail']); 


////////////// ADMIN  ROUTES///////////
Route::group(['middleware'=> 'role:1,2'],function(){
    Route::view('/admin/home','admin.index')->name('admin.index');
    Route::view('/admin/jobs','admin.jobs');
    Route::view('/admin/interview', 'admin.interview');
    Route::view('/admin/add-jobs','admin.add-jobs');
    Route::post('/add-job',[AdminController::class,'addJob']);
    Route::post('/updatejob',[AdminController::class,'updateJob']);
    Route::post('/admin/inviteInterview',[AdminController::class,'inviteInterview']);
    Route::post('/admin/rejectInterview',[AdminController::class,'rejectInterview']);
    Route::post('/updateInterviewStatus/{id}',[AdminController::class,'updateInterviewStatus']);
    Route::get('/removeJob',[AdminController::class,'removeJob']);
    Route::view('/admin/applied/wordpress','admin.applied');
    Route::get('/admin/jobs/{title}/details',[AdminController::class,'jobDetails'])->name('job.details');  
    Route::get('/admin/jobs/{title}/applied',[AdminController::class,'jobApplied'])->name('job.applied');  
    Route::get('/admin/jobs/{title}/applied/{name}/{id}',[AdminController::class,'applicantDetails']);
    Route::get('/admin/applied/{title}/{name}/{id}/status',[AdminController::class,'applicantStatus']);  
});

//////////////// ADMIN LOGIN ROUTES ///////////
Route::get('/admin',[AdminController::class,'loginView'])->name('admin.login');
Route::post('/admin/login',[AdminController::class,'loginUser']);
Route::get('/admin/logout',[AdminController::class,'logoutUser']);
Route::get('/admin/verify',[AdminController::class,'verifyotp']);
Route::post('/admin/verified',[AdminController::class,'accountverify']);
Route::post('/admin/resendotp',[AdminController::class,'resendOtp']);

/////// ADMIN SPECIAL PERMISSIONS ROUTES /////////// 
Route::group(['middleware'=>'role:1'],function(){
    Route::post('/add-user',[AdminController::class,'addUser']);
    Route::view('/admin/adduser','admin.add-user');
    Route::view('/admin/manageuser','admin.manage-users');
});


