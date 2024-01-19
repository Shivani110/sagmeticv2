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
            <h4>Applied</h4>
            <p>Showing 10 applicants</p>
        </div>
        <div class="job-filter ms-auto">
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Sort By : Newest
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
    <table class="table card-table" >
        <tr>
            <th>Name</th>
            <th>Applied Date</th>
            <th>Position</th>
            <th>Contact</th>
            <th>Status</th>
            <th></th>
        </tr>
        <tbody>
            @foreach ($applicants as $applicant)           
                <tr>
                    <td>{{$applicant->name}}</td>
                    <td>{{$applicant->created_at->format('Y-m-d')}}</td>
                    <td>{{$job->title}}</td>
                    <td>{{$applicant->email}}</td>
                    <td><a href="#" class="btn btn-sm btn-outline-danger">{{$applicant->current_status}}</a></td>
                    <td>
                        <div class="btn-group ">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-fill" style="" ></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{url('/admin/jobs/'.$job->title.'/applied/'.$applicant->name)}}">Details</a></li>
                                <li><a class="dropdown-item" href="#">Remove</a></li>
                            </ul>
                    </div>
                    </td>
                </tr>
            @endforeach         
        </tbody>
    </table>
        </div>
        </div>
@endsection