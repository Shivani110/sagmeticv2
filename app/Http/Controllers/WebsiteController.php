<?php

namespace App\Http\Controllers;

use App\Models\ApplicantDetails;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as File;

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

    function applyJob(Request $request, $title,$id){
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required|numeric|min:10',
            'qualification'=>'required',
            'university'=>'required',
            'filename'=>'required',
        ]);
        if($data){
            $applicant = new ApplicantDetails;
            $applicant->name = $request->name;
            $applicant->email = $request->email;
            $applicant->phone = $request->phone;
            $applicant->qualification = $request->qualification;
            $applicant->university = $request->university;
            $applicant->save();
        
            
        };
        // $job = Jobs::where('id',$id)->first();
        return view('frontend.job-application',compact('job'));
    }

}
