<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php $added_by =  App\Models\User::where('id',$add_job['added_by'])->first(); ?>
    <h4>New job Listing Added</h4>
    <p>Job AddedBY : {{$added_by['name']}} Email :{{$added_by['email']}}</p>
    <p>Job Title : {{$add_job['title']}}</p>
    <p>Job department : {{ $add_job['department']}}</p>
    <p>Job salary : {{ $add_job['salary']}}</p>
</body>
</html>