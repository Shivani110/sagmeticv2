@extends('masterlayout.website_frontend.layout')
@section('content')
<!-- Join-section -->  
<section class="top-banner-sec">
    <div class="container">
        <div class="top-banner-content">
            <div class="row">
                <div class="col-md-6 top-banner-heading">
                    <h1>Join Our Team</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{url('/'.'#home')}}">HOME</a></li>
                          <li class="breadcrumb-item"><a href="./ourservices.html">OUR SERVICES</a></li>
                          <li class="breadcrumb-item active" aria-current="page">CAREERS</li>
                        </ol>
                      </nav>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="{{asset('website_frontend/images/jointeam.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="trending-sec">
    <div class="container">
        <div class="trending-content">
            <div class="lets-work">
              <div class="red-heading top-heading" data-aos="zoom-in-up">
                <h5>Lets work together</h5>
              </div>
                <h2>Trending Opportunities</h2>
                <p>Join our team and work with specialists in each of their fields. Improve your abilities every day by working with the top professionals in the field. Take a look at our career options and start down the path to excellence in your field.</p>
            </div>
            <div class="row">
                <?php $jobs = App\Models\Jobs::all(); ?>
                @foreach ($jobs as $job)
                    <div class="col-md-6">
                    <div class="hover-box">
                        <div class="line1"></div>
                        <div class="line2"></div>
                        <div class="line3"></div>
                        <div class="line4"></div>
                        <div class="job-content">
                        <div class="jobs">
                        <div class="icon">
                            <img class="img-fluid" src="{{asset($job->icon_url)}}" alt="">
                        </div>
                            <h3>{{$job->title}}</h3>
                        </div>
                        <a href="#">MOHALI</a>
                        <p>Experience Required: {{$job->experience}}</p>
                        <div class="button">
                            <a href="{{url('/careers/'.$job->title)}}" class="btn" >Apply Now   <img class="img-fluid" src="{{asset('website_frontend/images/button-polygon')}}.svg" alt=""></a>
                        </div>
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="main-img-sec">
    <div class="container">
        <div class="main-img-content">
            <img src="{{asset('website_frontend/images/careerbg.png')}}" class="img-fluid" alt="">
        </div>
    </div>
</section>

@endsection