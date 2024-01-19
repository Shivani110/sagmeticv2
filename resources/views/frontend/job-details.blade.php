@extends('masterlayout.website_frontend.layout')
@section('content') 

<section class="banner-sec " id="banner" >
    <div class="container">
        <h3 class="text-center">{{$job->title}} • {{$job->department}} </h3>
        <div class="row">
            <div class="card col-7 mx-2">
                <div class="card-body" >
                    <?php echo $job->description?>
                    Skills :<br>
                    <?php $skills = explode(',',$job->skills); ?>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($skills as $skill)
                            <div class="col-md-4">
                                <ul class="list-group">
                                    <li class="list-item">{{ $skill }}</li>
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-4" style="height: 35rem">
                <div class="card-title my-1">
                    Department : <br>
                </div>
                <div class="card-body text-muted p-1">
                    {{$job->department}}
                </div>
                <div class="card-title my-1">
                    Job Type : <br>
                </div>
                <div class="card-body text-muted p-1">
                    {{$job->job_type}}
                </div>
                <div class="card-title my-1">
                    Experience : <br>
                </div>
                <div class="card-body text-muted p-1">
                    {{$job->experience}}
                </div>
                <div class="card-title my-1">
                    Salary : <br>
                </div>
                <div class="card-body text-muted p-1">
                    {{$job->salary}}
                </div>
                <div class="card-title my-1">
                    Date Posted : <br>
                </div>
                <div class="card-body text-muted p-1">
                    {{$job->created_at->format('Y-m-d')}}
                </div>
                <div class="buton">
                    <a href="{{url('/careers/'.$job->title.'/'.$job->id.'/application')}}" class="btn btn-danger btn-sm p-1 mb-2" style="color: white">Apply Now <i class="ri-send-plane-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection