<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    function jobDetails($title,$id){
        $job = Jobs::where('id',$id)->first();
        return view('frontend.job-details',compact('job'));
    }
    function applyJobView($title,$id){
        $job = Jobs::where('id',$id)->first();
        return view('frontend.job-application',compact('job'));
    }
}
