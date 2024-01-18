@extends('masterlayout.website_frontend.layout')
@section('content')

<section class="banner-sec justify-content-center" id="banner">
    <div class="container ms-4">
        <h4>Applying for {{$job->title}}</h4>
        <div class="card my-4">
            <div class="card-header">
                Basic Information
            </div>
            <div class="card-body">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="Rahul Sharma" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Email</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="rahul@gmail.com" >
                    </div>
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" >
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
                    <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="Rahul Sharma" >
                </div>
                <div class="col-md-3">
                    <label for="inputPassword4" class="form-label">City</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="rahul@gmail.com" >
                </div>
                <div class="col-3">
                    <label for="inputAddress" class="form-label">State</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" >
                </div>
                <div class="col-3">
                    <label for="inputAddress" class="form-label">Zipcode</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" >
                </div>
                <div class="col-8">
                    <label for="inputAddress" class="form-label">Country</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" >
                </div>
            
            </div>
        </div>
        <div class="card my-4">
            <div class="card-header">
                Professional Details
            </div>
            <div class="card-body">
                <h6>Education</h6>
                <div class="row">
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">Education Level</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" >
                    </div>
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">University</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" >
                    </div>
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">State</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" >
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
     </form> 
        <div class="card my-4 col-4">
               Upload Resume
            
            <div class="row">
                <div class="card-body">
                    <form action="{{url('/file-upload')}}" class="dropzone" id="myDropzone" data-dz-name="lassi">
                        @csrf
                            <div class="dz-message">
                                <p>Drop files here or click to upload.</p>  
                            </div>
                    </form>                
                </div>
            </div>
        </div>

          
                <div class="but my-3">
                    <button class="btn btn-danger" id="invite">Submit</button>
                    </form>
                </div>
    </div>
</section>
<script>
    Dropzone.options.myDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 5, // MB
        acceptedFiles: ".pdf",
        addRemoveLinks: true,
        init: function() {
            this.on("success", function(file, response) {
                // Handle the success
            });
            this.on("error", function(file, errorMessage, xhr) {
                // Handle the error
            });
        }
    };
</script>

@endsection