<?php

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
Route::view('/','admin.index');
Route::view('/admin/jobs','admin.jobs');
Route::view('/admin/interview', 'admin.interview');
Route::view('/admin/adduser','admin.add-user');
Route::view('/admin/manageuser','admin.manage-users');
Route::view('/admin/add-jobs','admin.add-jobs');
Route::view('/admin/applied/wordpress','admin.applied');
Route::view('/admin/applied/wordpress/applicantid=1','admin.applicant-details');

