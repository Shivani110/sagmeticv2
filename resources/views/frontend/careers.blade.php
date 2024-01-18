@extends('masterlayout.website_frontend.layout')
@section('content')

<style>
    .card-title{
        color: rgb(143, 24, 24)
    }
</style>
<section class="banner-sec justify-content-center" id="banner">
        <h4 style="text-align: center">Current <strong style="color: red">Vacancies</strong></h4>
            <?php $jobs = App\Models\Jobs::all(); ?>
            <div class="row my-5" style="justify-content:center">
                @foreach ($jobs as $job)
                <div class="card col-3 mx-2">
                    <a href="{{url('/careers/'.$job->title.'/'.$job->id)}}">
                        <div class="card-title">
                        <strong>{{$job->title}}</strong>
                        </div>
                        <div class="card-subtitle text-muted my-1">
                            Experience : {{$job->experience}}
                        </div>
                        <div class="card-subtitle text-muted my-1">
                            Salary : {{$job->salary}}
                        </div>
                        <div class="card-subtitle text-muted my-1 ">
                            Department : {{$job->department}}
                        </div>
                        <div class="card-subtitle text-muted my-1 ">
                            Job Posted : {{$job->created_at->format('Y-m-d')}}
                        </div>
                        {{-- <div class="card-body"> --}}
                            <button class="btn btn-danger btn-sm p-1 my-2" style="color: white;font-size:15px"> Apply Now</button>
                        {{-- </div> --}}
                    </a>
                </div>
                @endforeach
            </div>
  </section>
@endsection