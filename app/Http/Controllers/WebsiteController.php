<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\ApplicantDetails;
use App\Models\Jobs;
use App\Models\JobsApplied;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as File;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    function jobDetails($title){
        $job = Jobs::where('title',$title)->first();
        return view('frontend.job-details',compact('job'));
    }
    function applyJobView($title){
        $job = Jobs::where('title',$title)->first();
        return view('frontend.job-application',compact('job'));
    }

    function uploadFile(Request $request){
        $request->validate([
            'file'=>'required'
        ]);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('applicant/uploaded_files/'),$filename);
            $filepath = 'applicant/uploaded_files' . '/' . $filename;
            return true;
        }
    }
    function deleteFile(Request $request){
        $filename = $request->filename;
        $filepath = public_path('applicant/uploaded_files') . '/' . $filename;

        if (File::exists($filepath)) {
            if (File::delete($filepath)) {
                return response()->json(['success' => 'File deleted successfully']);
            } else {
                return response()->json(['error' => 'Unable to delete the file'], 500);
            }
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }

    function applyJob(Request $request, $title){
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required|numeric|min:10',
            'filename'=>'required',
        ]);
        if($data){
           
            $job_applied = new JobsApplied;
            $job_applied->job_id = $request->job_id;
            $job_applied->name = $request->name;
            $job_applied->email = $request->email;
            $job_applied->phone = $request->phone;
            $job_applied->attached_file = $request->filename;
            $job_applied->save();
            $job = Jobs::where('id',$request->job_id)->first();
            // Mail::to(env('MAIL_USERNAME'))->send(new );
            return view('frontend.apply-success',compact('job'));
        };
       
    }
    
    function SendMail(Request $request){
       
        $content = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        $sent  = Mail::to(env('MAIL_USERNAME'))->send(new ContactUsMail($content));
        if($sent){

            return response()->json('success');
        }
    }

}
