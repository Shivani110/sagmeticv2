<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h6>Successfully Submitted Job Application </h6>
    <p>Position : {{$job['title']}}</p>
    <p>Applicant Name : {{$job_applied['name']}}</p>
    <p>Contact Details : </p>
    <p>Phone : {{$job_applied['phone']}}</p>
    <p>Email : {{$job_applied['email']}}</p>
   <strong>We'll Contact You Shortly!</strong>
</body>
</html>