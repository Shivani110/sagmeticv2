<?php

namespace App\Http\Controllers;

use App\Mail\InviteInterviewMail;
use App\Mail\JobAddedMail;
use App\Mail\UserAddMail;
use App\Models\Interview;
use App\Models\Jobs;
use App\Models\JobsApplied;
use App\Models\User;
use DateTime;
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


    function loginView(){
        return view('admin.login');
    }
    function jobDetails($title){
        $job = Jobs::where('title',$title)->first();
        if($job){
            return view('admin.job-details',compact('job'));
        }
    }
    function jobApplied($title){
        $job = Jobs::where('title',$title)->first();
        $applicants= JobsApplied::where('job_id',$job->id)->get();
        if($applicants){
            return view('admin.applied',compact('applicants','job'));
        }
    }
    function applicantDetails($title,$name){
        $job = Jobs::where('title',$title)->first();
        $applicant= JobsApplied::where('name',$name)->first();
        if($applicant){
            return view('admin.applicant-details',compact('applicant','job'));
        }
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
                Mail::to(env('MAIL_USERNAME'))->send(new UserAddMail($adduser));
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
            'icon'=>'required|mimes:png,jpg,svg',
            'description'=>'required',
            'jobtype'=>'required',
            'skills'=>'required',
            'salary'=>'required',
            'department'=>'required',
            'experience'=>'required',
        ]);
        if($request->hasFile('icon')){
            $uploadedFile = $request->file('icon');
            $filename = $uploadedFile->getClientOriginalName();
            $uploadedFile->move(public_path('images/jobicons'), $filename);
            if($jobdata){
                $add_job = new Jobs;
                $add_job->title = $request->title;
                $add_job->icon_url = $filename;
                $add_job->description = $request->description;
                $add_job->job_type = $request->jobtype;
                $add_job->department = $request->department;
                $add_job->skills = $request->skills;
                $add_job->salary = $request->salary;
                $add_job->experience = $request->experience;
                $add_job->added_by = Auth::user()->id;
                $add_job->save();
                Mail::to(env('MAIL_USERNAME'))->send(new JobAddedMail($add_job));
                return redirect()->back()->with('success','Job Added Successfully!');
            }else{
                return redirect()->back()->with('error','An error occured!');
    
            }   
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

    function removeJob(Request $request){
        $job = Jobs::where('id',$request->id)->delete();
        if($job){
            return $job;
        }
    }
    function inviteInterview(Request $request){
        $data = $request->validate([
            'datetime'=>'required',
        ]);
        if($data){
            $msg = $request->message;
            $datetime = new DateTime($request->datetime);            
            $applicant = JobsApplied::with('jobs')->where('id',$request->applicant_id)->first();
            $applicant->current_status = 'Invited';
            $applicant->save();

            $interview = new Interview;
            $interview->applicant_id = $request->applicant_id;
            $interview->scheduled_at = $datetime;
            $interview->save();
            $mail = Mail::to($applicant->email)->send(new InviteInterviewMail($applicant,$msg,$interview));
        
        if($mail){
            return redirect()->back()->with('success','Applicant Invited and mail sent!');
        }
        }

    }
}
