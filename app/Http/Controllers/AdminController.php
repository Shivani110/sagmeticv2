<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{


    ////// Login User //////
    function loginUser(Request $request){
        $user = $request->validate([
            'useremail'=>'required',
            'password'=>'required',
        ]);
        if($user){
            if(Auth::attempt(['email'=>$request->useremail,'password'=>$request->password])){
                return redirect()->route('admin.index')->with('success','Logged In Successfuly!');
            }
            else{
                return redirect()->route('admin.login');
            }
        }else{
            return redirect()->route('admin.login');
        }
    }
    function logoutUser(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

    ///// ADD USER FUNCTION /////
    function addUser(Request $request){
        // validation
        $user = $request->validate([
            'username'=>'required',
            'userphone'=>'required|numeric|min:10',
            'useremail'=>'required',
            'userpassword'=>'required',
        ]);
        //// CHECK IF USER ALREADY EXISTS ////
        $existing = User::where([['email','=',$request->useremail],['phone','=',$request->userphone]])->first();
        if($existing){
            return redirect()->back()->with('error','User Already Exists!');
        }
        //// ELSE ADD NEW USER ////
        else{
            if($user){
                $adduser = new User;
                $adduser->name = $request->username;
                $adduser->email = $request->useremail;
                $adduser->phone = $request->userphone;
                $adduser->password = Hash::make($request->userpassword);
                $adduser->role = 2;
                $adduser->save();
                // Mail::send
                return redirect()->back()->with('success','User added Successsfully!');
            }
            else{
                return redirect()->back()->with('error','An error occured!');
    
            }
        }
    }

    //////// ADD JOBS /////////
    function addJob(Request $request){
        $jobdata = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'jobtype'=>'required',
            'skills'=>'required',
            'salary'=>'required',
            'department'=>'required',
            'experience'=>'required',
        ]);
        if($jobdata){
            $add_job = new Jobs;
            $add_job->title = $request->title;
            $add_job->description = $request->description;
            $add_job->job_type = $request->jobtype;
            $add_job->department = $request->department;
            $add_job->skills = $request->skills;
            $add_job->salary = $request->salary;
            $add_job->experience = $request->experience;
            $add_job->added_by = Auth::user()->id;
            $add_job->save();
            return redirect()->back()->with('success','Job Added Successfully!');
        }else{
            return redirect()->back()->with('error','An error occured!');

        }
    }
    //////// UPDATE JOB /////////
    function updateJob(Request $request){
        $jobdata = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'jobtype'=>'required',
            'skills'=>'required',
            'salary'=>'required',
            'department'=>'required',
            'experience'=>'required',
        ]);
        if($jobdata){
            $update_job = Jobs::where('id',$request->job_id)->first();
            $update_job->title = $request->title;
            $update_job->description = $request->description;
            $update_job->job_type = $request->jobtype;
            $update_job->department = $request->department;
            $update_job->skills = $request->skills;
            $update_job->salary = $request->salary;
            $update_job->experience = $request->experience;
            $update_job->added_by = Auth::user()->id;
            $update_job->update();
            return redirect()->back()->with('success','Job Updated Successfully!');
        }else{
            return redirect()->back()->with('error','An error occured!');

        }
    }
}
