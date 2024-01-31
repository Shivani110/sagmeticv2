<?php

namespace App\Http\Controllers;

use App\Mail\InviteInterviewMail;
use App\Mail\JobAddedMail;
use App\Mail\UserAddMail;
use App\Mail\VerifyLogin;
use App\Models\Interview;
use App\Models\Jobs;
use App\Models\JobsApplied;
use App\Models\User;
use App\Models\Otp;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;
use Mail;
use Carbon\Carbon;

class AdminController extends Controller
{


    ////// Login User //////
    function loginUser(Request $request){
        $user = $request->validate([
            'useremail'=>'required',
            'password'=>'required',
        ]);
        
        $users = User::where('email','=',$request->useremail)->first();

        if($users){
            if(Hash::check($request->password,$users->password)){
                $otp = rand(100000, 999999);
                $otps = new Otp;
                $otps->user_id = $users->id;
                $otps->otp = $otp;
                $otps->expires_at = now()->addMinutes(10);
                $otps->save();
    
                $userS = User::where('email','=',$request->useremail)->first();
                $otpS = Otp::where('user_id','=',$userS->id)->first();
        
                $mailData = array(
                    $userS->name,
                    $userS->email,
                    $otpS->otp,
                );
    
                $mail = Mail::to($userS->email)->send(new VerifyLogin($mailData)); 
    
                session_start();
                $request->session()->put('email', $request->useremail);  
                $request->session()->put('password', $request->password);
    
                return redirect('/admin/verify')->with('success','Please check your gmail for account verification');
            }else{
                return redirect()->route('admin.login')->with('error','Incorrect password');
            }
        }else{
            return redirect()->route('admin.login')->with('error','Incorrect username');
        }
        
    }
     
    public function verifyotp(){
        return view('admin.verification');
    }

    public function accountverify(Request $request){
        $username = $request->session()->get('email');
        $password = $request->session()->get('password');
        $otp = $request->otp;
        $usercode = Otp::where('otp','=',$otp)->first();
        
        if($usercode){
            $expiretime = $usercode->expires_at;
            $current = Carbon::now();
            $currenttime = $current->toDateTimeString();

            if($expiretime > $currenttime){
                // echo 'expiretime'.$expiretime;
                
                if(Auth::attempt(['email'=>$username,'password'=>$password])){
                    $otp = Otp::where('user_id','=',Auth::user()->id)->delete();
                    return redirect()->route('admin.index')->with('success','Logged In Successfuly!');
                }else{
                    return redirect()->route('admin.login'); 
                }
            }else{
                // echo 'currenttime'.$currenttime;
                return redirect()->route('admin.login'); 
            }
        }else{
            return redirect('/admin/verify')->with('error','Incorrect OTP');
        }
    }

    public function resendOtp(Request $request){
        $username = $request->session()->get('email');
        $password = $request->session()->get('password');

        $users = User::where('email','=',$username)->first();

        if($users){
            if(Hash::check($password,$users->password)){
                $otp = rand(100000, 999999);
                $otps = new Otp;
                $otps->user_id = $users->id;
                $otps->otp = $otp;
                $otps->expires_at = now()->addMinutes(10);
                $otps->save();
    
                $userS = User::where('email','=',$username)->first();
                $otpS = Otp::where('user_id','=',$userS->id)->first();
        
                $mailData = array(
                    $userS->name,
                    $userS->email,
                    $otpS->otp,
                );
    
                $mail = Mail::to($userS->email)->send(new VerifyLogin($mailData)); 
    
                session_start();
                $request->session()->put('email', $username);  
                $request->session()->put('password', $password);
    
                $message = 'Please check your gmail for account verification';
                return response()->json($message);
            }else{
                return redirect()->route('admin.login')->with('error','Incorrect password');
            }
        }else{
            return redirect()->route('admin.login')->with('error','Incorrect username');
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
    function applicantDetails($title,$name,$id){
        $job = Jobs::where('title',$title)->first();
        $applicant= JobsApplied::where('id',$id)->first();
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
 ////////// MAIL TO HR OR THE USER ON ADDING THEM  ///////
                $to = $adduser->email;
                $subject = "HR Added";
                $message = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
                    <title>Appoinment Confirmation Email</title>
                </head>
            
                <body>
                    <table class="body-wrap" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
                        <tbody>
                            <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                                <td class="container" width="600" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                                    <div class="content" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                        <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope="" itemtype="http://schema.org/ConfirmAction" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                            <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-wrap" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 30px;border: 3px solid #67a8e4;border-radius: 7px; background-color: #fff;" valign="top">
                                                    <meta itemprop="name" content="Confirm Email" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                            <h4>Account Created as HR for user '.$adduser->name.'</b> </h4>
                                                            </td>
                                                        </tr>
                                                        <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                            <h5>Login Credentials</h5>    
                                                            Username '.$adduser->email.' <br>
                                                            Password '.$request->userpassword.'
                                                            </td>
                                                        </tr>
                                                    
                                                        <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                        '.$adduser->name.'<br><br>
                                                        '.$adduser->email.'<br><br>
                                                        '.$adduser->phone.'<br><br>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
                </body>
                </html>';
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: sagmetic.com' . "\r\n";

                $mail = mail($to,$subject,$message,$headers);
                if($mail == true){
                    print_r(json_encode('success'));
                }else{
                    print_r(json_encode('failed to send email'));
                }

            }
            return redirect()->back()->with('success','User added Successsfully!');
        }
    }

    //////// ADD JOBS /////////
    function addJob(Request $request){
        $jobdata = $request->validate([
            'title'=>'required',
            'url_slug'=>'required',
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
                $user  = User::where('id',Auth::user()->id)->first();
                $add_job = new Jobs;
                $add_job->title = $request->title;
                $add_job->url_slug = $request->url_slug;
                $add_job->icon_url = $filename;
                $add_job->description = $request->description;
                $add_job->job_type = $request->jobtype;
                $add_job->department = $request->department;
                $add_job->skills = $request->skills;
                $add_job->salary = $request->salary;
                $add_job->experience = $request->experience;
                $add_job->added_by = Auth::user()->id;
                $add_job->save();

//////////// MAIL TO ADMIN ON JOB ADDITION ///////////////
                $to = env('MAIL_USERNAME');
                $subject = "New Job Listing";
                $message = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
                    <title>New job Listed</title>
                </head>
            
                <body>
                    <table class="body-wrap" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
                        <tbody>
                            <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                                <td class="container" width="600" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                                    <div class="content" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                        <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope="" itemtype="http://schema.org/ConfirmAction" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                            <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-wrap" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 30px;border: 3px solid #67a8e4;border-radius: 7px; background-color: #fff;" valign="top">
                                                    <meta itemprop="name" content="Confirm Email" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                            <h4>New job has been listed by'.$user->name.' Your interview has been scheduled </h4>
                                                            </td>
                                                        </tr>
                                                        <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                            <h5>Job Description</h5>    
                                                            Title :'.$request->title.' <br>
                                                            Salary : '.$request->salary.'<br>
                                                            Experience : '.$request->experience.'
                                                            </td>
                                                        </tr>
                                                    
                                                        <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                        '.$user->name.'<br><br>
                                                        '.$user->email.'<br><br>
                                                        '.$user->phone.'<br><br>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
                </body>
                </html>';
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: sagmetic.com' . "\r\n";
                $mail = mail($to,$subject,$message,$headers);
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
            'slug'=>'required',
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
            $update_job->url_slug = $request->slug;
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
////////////////// MAIL TO APPLICANT ON INTERVIEW INVITE ///////////////////////
            $to = $applicant->email;
            $subject = "Interview Scheduled";
            $message = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
                <title>Interview Invite</title>
            </head>
        
            <body>
                <table class="body-wrap" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
                    <tbody>
                        <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                            <td class="container" width="600" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                                <div class="content" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                    <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope="" itemtype="http://schema.org/ConfirmAction" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                        <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td class="content-wrap" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 30px;border: 3px solid #67a8e4;border-radius: 7px; background-color: #fff;" valign="top">
                                                <meta itemprop="name" content="Confirm Email" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <table width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                        <h4>Congratulations '.$applicant->name.' Your interview has been scheduled </h4>
                                                        </td>
                                                    </tr>
                                                    <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                        <h5>Timings</h5>    
                                                        Time :'. \Carbon\Carbon::parse($interview->scheduled_at)->format("h:i a") .' <br>
                                                        Date Of Interview : '. \Carbon\Carbon::parse($interview->scheduled_at)->format("Y-m-d").'
                                                        <br>'.$msg.'
                                                        </td>
                                                    </tr>
                                                
                                                    <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                    '.$applicant->name.'<br><br>
                                                    '.$applicant->email.'<br><br>
                                                    '.$applicant->phone.'<br><br>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
            </body>
            </html>';
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: sagmetic.com' . "\r\n";

            $mail = mail($to,$subject,$message,$headers);
        
        if($mail){
            return redirect()->back()->with('success','Applicant Invited and mail sent!');
        }
        }

    }


    function rejectInterview(Request $request){
        $applicant = JobsApplied::where('id',$request->applicant_id)->first();
        $msg = $request->message;
        $applicant->current_status = 'Rejected';
        $applicant->save();
        ////////////////// MAIL TO APPLICANT ON INTERVIEW Rejected ///////////////////////
        $to = $applicant->email;
        $subject = "Application Rejected";
        $message = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
            <title>Interview Invite</title>
        </head>
    
        <body>
            <table class="body-wrap" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
                <tbody>
                    <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <td style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                        <td class="container" width="600" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                            <div class="content" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope="" itemtype="http://schema.org/ConfirmAction" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                    <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-wrap" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 30px;border: 3px solid #67a8e4;border-radius: 7px; background-color: #fff;" valign="top">
                                            <meta itemprop="name" content="Confirm Email" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <table width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                    <h4>Sorry '.$applicant->name.' your application has been rejected </h4>
                                                    </td>
                                                </tr>
                                                <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                    <h5>Reason</h5>    
                                                   
                                                    <br>'.$msg.'
                                                    </td>
                                                </tr>
                                            
                                                <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                '.$applicant->name.'<br><br>
                                                '.$applicant->email.'<br><br>
                                                '.$applicant->phone.'<br><br>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        </body>
        </html>';
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: sagmetic.com' . "\r\n";

        $mail = mail($to,$subject,$message,$headers);
    
        if($mail){
            return redirect()->back()->with('success','Applicant Rejected and mail sent!');
        }
    }

    function applicantStatus($title,$name,$id){
        $interview = Interview::where('applicant_id',$id)->first();
        $applicant = JobsApplied::with('jobs')->where('id',$id)->first();
        return view('admin.applicant-status',compact('applicant','interview'));
    }
    function updateInterviewStatus(Request $request, $id){
        $request->validate([
            'hrstatus'=>'required',
            'techstatus'=>'required',
            'hiredstatus'=>'required',
        ]);
        $applicant = Interview::where('applicant_id',$id)->first(); 
        if($request->hrstatus  && $request->techstatus  && $request->hiredstatus == 'Hired'){
            $applicant->hr_round = true;
            $applicant->tech_round = true;
            $applicant->hired = true;
            $applicant->hr_remark = $request->hrremarks;
            $applicant->tech_remark = $request->techremarks;
            $applicant->interview_status = $request->hiredstatus;
            $applicant->final_remarks = $request->finalremarks;
        }else{

            if($request->hrstatus == 'Pass'){
                $applicant->hr_round = true;
                $applicant->hr_remark = $request->hrremarks;
                $applicant->interview_status = 'HR round';
            }else{
                $applicant->hr_round = false;
                $applicant->hr_remark = $request->hrremarks;
            }
            if($request->techstatus == 'Pass'){
                $applicant->tech_round = true;
                $applicant->tech_remark = $request->techremarks;
                $applicant->interview_status = 'Tech round';
            }
            else{
                $applicant->tech_round = false;
                $applicant->tech_remark = $request->techremarks;
            }
            if($request->hiredstatus == 'Hired'){
                $applicant->hired = true;
                $applicant->interview_status = $request->hiredstatus;
                $applicant->final_remarks = $request->finalremarks;
            }
            else{
                $applicant->hired = false;
                $applicant->interview_status = $request->hiredstatus;
                $applicant->final_remarks = $request->finalremarks;

            }
        }
        $applicant->save();
        return redirect()->back()->with('success','Applicant Status updated');
    }
}
