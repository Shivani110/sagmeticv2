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
                            <a href="{{url('/careers/'.$job->title.'/'.$job->id)}}" class="btn" >Apply Now   <img class="img-fluid" src="{{asset('website_frontend/images/button-polygon')}}.svg" alt=""></a>
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
<section class="benefits-sec" id="contact">
  <div class="container">
    <div class="benefits-content row">
      <div class=" col-lg-5 col-sm-12">
        <div class="benefit">
          <div class="green-heading top-heading" data-aos="zoom-in-up" >
            <h5>Why choose us</h5>
          </div>
          <div class="text">
            <h2>Benefits Of Choosing Our Agency</h2>
              <p>Joining our team means becoming part of a dynamic and innovative organization that values creativity, collaboration, and growth. You will have the chance to work on fascinating projects, hone your abilities, and have a real impact on the world as a member of our team. We provide flexible scheduling options, excellent pay, and a welcoming atmosphere for all employees. Join our team to develop your career!</p>
          </div>
           <div class="row">
            <div class="col-6">
              <div class="all-benefits">
                <img src="{{asset('website_frontend/images/housegym1.png')}}" class="img-fluid" alt="">
                <p>Bonuses</p>
              </div>
            </div>
            <div class="col-6">
              <div class="all-benefits">
                <img src="{{asset('website_frontend/images/housegym2.png')}}" class="img-fluid" alt="">
                <p>Festival Parties</p>
              </div>
            </div>
            <div class=" col-6">
              <div class="all-benefits">
                <img src="{{asset('website_frontend/images/housegym3.png')}}" class="img-fluid" alt="">
                <p>Friendly Environment</p>
              </div>
            </div>
            <div class=" col-6">
              <div class="all-benefits">
                <img src="{{asset('website_frontend/images/housegym4.png')}}" class="img-fluid" alt="">
                <p>Continues Learning</p>
              </div>
            </div>
           </div>
          </div>
        </div> 
        <div class=" col-lg-6  col-sm-12">
          <div class="form-sec">
            <div class="form-wrapper">
              <h3>Get a free quote</h3>
              <form>
                <div class="floating-label-group">
                  <input type="text" class="form-control" autocomplete="off"  required />
                    <label class="floating-label">Name</label>
                  </div>
                  <div class="floating-label-group">
                    <input type="email"  class="form-control" autocomplete="off"  required />
                      <label class="floating-label">Email</label>
                  </div>
                    <div class="floating-label-group">
                      <input type="text"  class="form-control" autocomplete="off"  required />
                        <label class="floating-label">Phone</label>
                    </div>
                      <div class="floating-label-group">
                        <input type="text"  class="form-control" autocomplete="off"  required />
                          <label class="floating-label">Subject</label>
                        </div>
                        <div class="floating-label-group">
                          <textarea cols="20" rows="5" class="form-control" autocomplete="off"  required></textarea>
                            <label class="floating-label">Message</label>
                          </div>
                          <div class="button">
                            <a href="#" class="btn" >Send Message <img class="img-fluid" src="{{asset('website_frontend/images/button-polygon')}}.svg" alt=""></a>
                        </div>
                          </form>    
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection