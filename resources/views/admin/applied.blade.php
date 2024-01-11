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


    <div class="showing-jobs d-flex">
        <div>
            <h4>Jobs</h4>
            <p>Showing 10 Jobs</p>
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
 
                <tr>
                    <td>Rahul Sharma</td>
                    <td>07/08/2024</td>
                    <td>Wordpress Developer</td>
                    <td>eail@gmail.com</td>
                    <td><a href="#" class="btn btn-sm btn-outline-danger">Pending</a></td>
                    <td>
                        <div class="btn-group ">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-fill" style="" ></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{url('admin/applied/wordpress/applicantid=1')}}">Details</a></li>
                                <li><a class="dropdown-item" href="#">Remove</a></li>
                            </ul>
                    </div>
                    </td>
                </tr>
           
                 <tr>
                    <td >Rahul Sharma</td>
                    <td>07/08/2024</td>
                    <td>Wordpress Developer</td>
                    <td>eail@gmail.com</td>
                    <td><a href="#" class="btn btn-sm btn-outline-danger">Pending</a></td>
                    <td>
                        <div class="btn-group ">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-fill" style="" ></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Details</a></li>
                                <li><a class="dropdown-item" href="#">Remove</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
           
            
 
                <tr>
                    <td >Rahul Sharma</td>
                    <td>07/08/2024</td>
                    <td>Wordpress Developer</td>
                    <td>eail@gmail.com</td>
                    <td><a href="#" class="btn btn-sm btn-outline-danger">Pending</a></td>
                    <td>
                        <div class="btn-group ">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-fill" style="" ></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Details</a></li>
                                <li><a class="dropdown-item" href="#">Remove</a></li>
                            </ul>
                    </div>
                    </td>
                </tr>
       
                
        </tbody>
    </table>
        </div>
        </div>
@endsection