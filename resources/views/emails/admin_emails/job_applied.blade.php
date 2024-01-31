<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h6>New Job Application for {{$job['title']}}</h6>
    <p>Applicant Name : {{$job_applied['name']}}</p>
    <p>Contact Details : </p>
    <p>Phone : {{$job_applied['phone']}}</p>
    <p>Email : {{$job_applied['email']}}</p>
    <p>Attached File : </p>
    <a href="{{asset('applicant/uploaded_files/'.$job_applied['attached_file'])}}">Click to View</a>
</body>
</html>