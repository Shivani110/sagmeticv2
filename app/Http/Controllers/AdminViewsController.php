<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class AdminViewsController extends Controller
{
    function loginView(){
        return view('admin.login');
    }
    function jobDetails($title,$id){
        $job = Jobs::find($id)->first();
        if($job){
            return view('admin.job-details',compact('job'));
        }
    }
}
