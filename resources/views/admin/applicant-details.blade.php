@extends('masterlayout.admin.layout')
@section('content')

<style>
    .card-container{
        width: 95%;
        
    }
    .btn{
        border-radius: 0px
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{url('admin/jobs')}}">Jobs</a></li>
      <li class="breadcrumb-item active" aria-current="page">Details</li>
    </ol>
</nav>

<div class="card-container ms-4">
    <h4>Applicant Details</h4>
    <div class="card my-4">
        <div class="card-header">
            Basic Information
        </div>
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="Rahul Sharma" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Email</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="rahul@gmail.com" disabled>
                </div>
                <div class="col-6">
                    <label for="inputAddress" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" disabled>
                </div>
            </form> 
        </div>
    </div>
    <div class="card my-4">
        <div class="card-header">
            Address
        </div>
        <div class="card-body">
        <form class="row g-3">
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="Rahul Sharma" disabled>
            </div>
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">City</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="rahul@gmail.com" disabled>
            </div>
            <div class="col-3">
                <label for="inputAddress" class="form-label">State</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" disabled>
            </div>
            <div class="col-3">
                <label for="inputAddress" class="form-label">Zipcode</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" disabled>
            </div>
            <div class="col-8">
                <label for="inputAddress" class="form-label">Country</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" disabled>
            </div>
        </form> 
        </div>
    </div>
    <div class="card my-4">
        <div class="card-header">
            Professional Details
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h6>Education</h6>
                    <ul>
                        <li>Msc.IT from University of California</li>
                        <li>Bachelors ffrom this that</li>
                       
                    </ul>
                </div>

                <div class="col-6">
                    <div class="container">
                        
                        <div class="row ">
                            <h6>Skills</h6>
                            <div class="col-md-6">
                               
                                <ul>
                                    <li>HTML</li>
                                    <li>CSS</li>
                                    <li>JavaScript</li>
                                    <li>Bootstrap</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                
                                <ul>
                                    <li>PHP</li>
                                    <li>Laravel</li>
                                    <li>Python</li>
                                    <li>MongoDB</li>
                                </ul>
                            </div>
                        </div>
         
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-4">
        <div class="card-header">
           Attached File
        </div>
        <div class="card-body">
            <iframe  src="{{ asset('resume/resume1.pdf') }}" width="40%" height="300px"></iframe>

        </div>
    </div>
            <div class="cont mx-2">Message</div>
            <div class="form-floating">
                <form action="">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"> </textarea>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="button">Send</button>
                    </div>  
                </form>      
            </div>
            <div class="date">
                <h6>Schedule Interview</h6>
                <form action="">
                <input type="text" name="" id="datetime" placeholder="   Select Date and Time">
                <i class="ri-calendar-fill" style="font-size: 17px;margin-left: -30px;"></i>
            </div>
            <div class="but my-3">
                <button class="btn btn-danger" id="invite">Invite to Interview</button>
                </form>
                <button class="btn btn-outline-dark">Reject</button>
            </div>
</div>
<script>
    $('#invite').on('click',function(){
        $('#datetime').show()
    })
</script>
<script>
    flatpickr("#datetime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
    });
    
</script>
@endsection