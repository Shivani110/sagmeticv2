<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h5>Congratulations {{$applicant['name']}} You have been invited for The interview</h5>
    <p>Position: {{$applicant->jobs['title']}}</p>
    <p>Message: {{$msg}}</p>
    <p>Scheduled Time: {{ $interview['scheduled_at']->format('h:i a') }}</p>
    <p>Scheduled Date : {{$interview['scheduled_at']->format('Y-m-d')}}</p>
</body>
</html>