@extends('masterlayout.website_frontend.layout')

@section('content')
<!-- Join-section -->  

<section class="trending-sec">
    <div class="container">
        <div class="trending-content">
            <div class="lets-work mt-5 p-1">
                <div class="red-heading top-heading" data-aos="zoom-in-up">
                    <h5>Lets work together</h5>
                </div>
                <h2>Trending Opportunities</h2>
                
                <?php $jobs = App\Models\Jobs::all(); ?>
                <p>Join our team and work with specialists in each of their fields. Improve your abilities every day by working with the top professionals in the field. Take a look at our career options and start down the path to excellence in your field.</p>
            </div>
            @if(count($jobs) > 0)
            <div class="row">
                @foreach ($jobs as $job)
                    <div class="col-md-6">
                        <div class="hover-box" data-id = "{{url('/careers/'.$job->url_slug)}}" style = "cursor:pointer">
                            <div class="line1"></div>
                            <div class="line2"></div>
                            <div class="line3"></div>
                            <div class="line4"></div>
                            <div class="job-content">
                                <div class="jobs">
                                    <div class="icon">
                                        <img class="img-fluid" src="{{asset('images/jobicons/'.$job->icon_url)}}" alt="">
                                    </div>
                                    <h3>{{$job->title}}</h3>
                                </div>
                                <a href="#">MOHALI</a>
                                <p>Experience Required: {{$job->experience}}</p>
                                <div class="button" onclick="{{url('/careers/'.$job->url_slug)}}">
                                    <a href="{{url('/careers/'.$job->url_slug)}}" class="btn" >Apply Now   <img class="img-fluid" src="{{asset('website_frontend/images/button-polygon')}}.svg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
            <h4>No Jobs Posted !</h4>
            @endif
        </div>
    </div>
</section>
<section class="main-img-sec">
<h1 class="sectionImage" style="display: none;">Section Image</h1>
    <div class="container">
        <div class="main-img-content">
            <img src="{{asset('website_frontend/images/careerbg.png')}}" class="img-fluid" alt="">
        </div>
    </div>
</section>
<script>
    $('.hover-box').on('click',function(){
        url_ = $(this).data('id');
        
        location.href = url_
    })
</script>
@endsection