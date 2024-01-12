@extends('masterlayout.admin.layout')
@section('content')

<style>
.ri-more-2-fill{
    font-weight: bolder
}
.job-filter{
    margin-right: 5%;
}
.btn{
    border-radius: 0px;
   
}
.dropdown .btn{
    width: 180px
}
.progress{
    rotate: 90deg;
    height: 5px;
    width: 30%;
    margin-top: 15%;
    margin-left: -13%;
    display: none;
}
</style>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{url('admin/jobs')}}">Jobs</a></li>
      <li class="breadcrumb-item active" aria-current="page">Applied</li>
    </ol>
</nav>
<div class="container">
    <div class="showing-jobs d-flex">
        <div>
            <h4>Applicant Status:</h4>
            <p>Rahul Sharma | PHP Developer</p>
        </div>
    </div>
    <div class="progress">
        <div class="progress-bar bg-danger" role="progressbar" aria-label="Danger example" style="width:100%"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <div class="row">
        <div class="status">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Invited
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                  Responded
                </label>
              </div>
        </div>
    </div>
</div>
@endsection