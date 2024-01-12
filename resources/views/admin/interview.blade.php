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
.card{
    border-radius: 0px;
    margin:10px
}
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Interviews</li>
    </ol>
</nav>

    <div class="showing-jobs d-flex">
        <div>
            <h4>Interviews</h4>
            <p>Interview List</p>
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
    {{-- <div class="card">
        <div class="card-body"> --}}
            <div class="container ">
                <div class="card d-flex flex-row" style="font-weight: bolder">
                        <div class="mx-3" style="margin:10px">Name</div>
                        <div  style="margin:10px;margin-left: 17%;margin-right: 17%;">Position</div>
                        <div  style="margin:10px">Interview Date</div>
                        <div  style="margin:10px;margin-left: 7%;margin-right: 8%;">Time</div>
                        <div  style="margin:10px">Status</div>
                        <div  style="margin:10px"></div>
                </div>
                <div class="card">
                    <table class="table table-borderless">
                        <div class="card-body">
                     
                            <tr>
                            <td>Rahul Sharma</td>
                            <td>Wordpress Developer</td>
                            <td>07/08/2024</td>
                            <td>9:00AM</td>
                            <td><a href="#" class="btn btn-sm btn-outline-danger">Pending</a></td>
                            <td>
                                <div class="btn-group ">
                                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill" style="" ></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{url('admin/applied/wordpress/applicantid=1')}}">Details</a></li>
                                        <li><a class="dropdown-item" href="{{url('admin/applied/wordpress/applicantid=1/status')}}">Status</a></li>
                                        <li><a class="dropdown-item" href="#">Remove</a></li>
                                    </ul>
                                </div>
                            </td>
                            </tr>
                        </div>
                    </table>
                </div>
            
            <div class="card">
                <table class="table table-borderless">
                    <div class="card-body">
                        <tr>
                            <td>Rahul Sharma</td>
                            <td>Wordpress Developer</td>
                            <td>07/08/2024</td>
                            <td>9:00AM</td>
                            <td><a href="#" class="btn btn-sm btn-outline-danger">Pending</a></td>
                            <td>
                                <div class="btn-group ">
                                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill" style="" ></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{url('admin/applied/wordpress/applicantid=1')}}">Details</a></li>
                                        <li><a class="dropdown-item" href="#">Status</a></li>
                                        <li><a class="dropdown-item" href="#">Remove</a></li>
                                    </ul>
                            </div>
                            </td>
                        </tr>
                    </table>
                </div>
            
            <div class="card">
                <table class="table table-borderless">
                    <div class="card-body">
                        <tr>
                            <td>Rahul Sharma</td>
                            <td>Wordpress Developer</td>
                            <td>07/08/2024</td>
                            <td>9:00AM</td>
                            <td><a href="#" class="btn btn-sm btn-outline-danger">Pending</a></td>
                            <td>
                                <div class="btn-group ">
                                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill" style="" ></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{url('admin/applied/wordpress/applicantid=1')}}">Details</a></li>
                                        <li><a class="dropdown-item" href="#">Status</a></li>
                                        <li><a class="dropdown-item" href="#">Remove</a></li>
                                    </ul>
                            </div>
                            </td>
                        </tr>
                    </div>
                    </table>
                </div>
            </div>
        </div>        
@endsection