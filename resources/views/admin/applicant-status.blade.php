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
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{url('admin/jobs')}}">Jobs</a></li>
      <li class="breadcrumb-item active" aria-current="page">Applied</li>
    </ol>
</nav>
    <div class="showing-jobs d-flex">
        <div>
            <h4>Applicant Status:</h4>
            <p>Rahul Sharma | PHP Developer</p>
        </div>
    </div>
   
@endsection