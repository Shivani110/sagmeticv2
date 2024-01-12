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
      <li class="breadcrumb-item active" aria-current="page">Jobs</li>
    </ol>
</nav>

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
                <a href="{{url('admin/add-jobs')}}" class="btn btn-sm btn-danger ">Add Job</a>
              </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
    <table class="table card-table" >
        <tr>
            <th>Jobs</th>
            <th>Salary</th>
            <th>Added On</th>
            <th>Experience</th>
            <th>Applied</th>
            <th></th>
        </tr>
        <tbody>
 
                <tr>
                    <td >Wordpress Developer</td>
                    <td>15k-20k</td>
                    <td>24/09/2024</td>
                    <td>0-1yrs</td>
                    <td><a href="{{url('admin/applied/wordpress')}}" class="btn btn-sm btn-outline-danger">20</a></td>
                    <td>
                        <div class="btn-group ">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-fill" style="" ></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Details</a></li>
                                <li><a class="dropdown-item" href="#">Applied</a></li>
                                <li><a class="dropdown-item" href="#">Remove</a></li>
                            </ul>
                    </div>
                    </td>
                </tr>
       
                <tr class="my-2">
                    <td>PHP Developer</td>
                    <td>15k-20k</td>
                    <td>24/09/2024</td>
                    <td>0-1yrs</td>
                    <td><a href="#" class="btn btn-sm btn-outline-danger">20</a></td>
                    <td>
                        <div class="btn-group ">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-fill" style="" ></i>
                            </button>
                            <ul class="dropdown-menu">
                            
                                <li><a class="dropdown-item" href="#">Details</a></li>
                                <li><a class="dropdown-item" href="#">Applied</a></li>
                                <li><a class="dropdown-item" href="#">Remove</a></li>

                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="my-2 mr-2">
                    <td>Wordpress Developer</td>
                    <td>15k-20k</td>
                    <td>24/09/2024</td>
                    <td>0-1yrs</td>
                    <td ><a href="#" class="btn btn-sm btn-outline-danger">20</a></td>
                    <td>
                        <div class="btn-group ">
                             <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                             <i class="ri-more-2-fill" style="" ></i>
                            </button>
                            <ul class="dropdown-menu">
                            
                                <li><a class="dropdown-item" href="#">Details</a></li>
                                <li><a class="dropdown-item" href="#">Applied</a></li>
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