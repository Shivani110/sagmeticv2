@extends('masterlayout.website_frontend.layout')
@section('content') 

<section class="trending-sec " id="banner" >
    <div class="head-sub justify-content-center mt-5 p-3">
                <h2 class="mt-5 text-center">Applying for {{$job->title}}</h2>
                <p class="text-center">HOME | CAREERS | <span style="color: red;">{{$job->title}}・{{$job->department}}</span> </p>
    </div>
    <div class="container ms-4 d-flex justify-content-center ">
        <!-- <h4>Applying for {{$job->title}}</h4> -->
        <div class="card my-4 col-8 ">
            
            <div class="card-body">
                <form class="row justify-content-center g-3" id="jobapplyform" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputEmail4" name="name" placeholder="Enter Name"  >
                        <span class="errormsgs" style="color: red;">
                        
                        </span>
                    </div>
                    <div class="col-md-8">
                        <label for="inputPassword4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Enter Email"  >
                        <span class="errormsgs" style="color: red;">
                    
                        </span>
                    </div>
                    <div class="col-8">
                        <label for="inputAddress" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="inputEmail4" name="phone" placeholder="Contact No." >
                        <span class="errormsgs" style="color: red;">
               
                        </span>
                    </div>
            
            <input type="text" name="filename" id="filename" hidden>
            <input type="text" name="job_id" id="job_id" value="{{$job->id}}" hidden>
                <div class="card my-4 col-8 d-flex justify-content-center" id="resumeUploadfile">
                    Upload Resume
                    
                    <div class="row ">
                        <div class="card-body">
                            <div id="myDropzone" class="dropzone">
                                <div class="dz-message">
                                    <p>Drop files here or click to upload.</p>
                                </div>
                            </div>              
                        </div>
                    </div>
                    <span class="errormsgs" id="resumerror" style="color: red;">
          
                    </span>
                    <button class="btn btn-outline-danger" type="submit" id="invite">Submit</button>
                </div>
            </div>
        </div>
         <span class="errormsgs" style="color: red;">  
         </span>

    </form>
</section>
<script>
    // Dropzone initialization code here
    Dropzone.options.myDropzone = {
        paramName: "file",
        url: "{{ url('/file-upload') }}",
        maxFilesize: 5,
        acceptedFiles: ".pdf,.doc,.docx",
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        },
        init: function() {
            this.on("success", function(file, response) {
                alert('submision')
                $('#filename').val(file.name);
            });
            this.on("removedfile", function(file, response) {
                
                $.ajax({
                    type: "get",
                    url: "{{url('/delete-file')}}",
                    data: {
                        filename:file.name,
                    },
               
                    success: function (response) {
                    }
                });
            });

            this.on("error", function(file, errorMessage, xhr) {
                // Handle error if needed
            });
        }
    };
// });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
     $('#jobapplyform').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData);

       $.ajax({
        type: "post",
        url: "{{url('/careers/'.$job->url_slug.'/application/apply')}}",
        data:  formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        processData: false,
        contentType: false,
        success: function (response) {
            $('.errormsgs').html('');
            location.href = "{{url('careers/'.$job->url_slug.'/apply-success')}}"
        },
        error: function(xhr, status, error) {
        var errors = JSON.parse(xhr.responseText);
            if(errors.errors.name && errors.errors.name[0]){
                $('[name="name"]').next('span').html(errors.errors.name[0]);
            }else{
                $('[name="name"]').next('span').html('');
            }
            if(errors.errors.email && errors.errors.email[0]){
                $('[name="email"]').next('span').html(errors.errors.email[0]);
            }
            else{
                $('[name="email"]').next('span').html('');

            }
            if(errors.errors.phone && errors.errors.phone[0]){
                $('[name="phone"]').next('span').html(errors.errors.phone[0]);
            }else{
                $('[name="phone"]').next('span').html('');

            }
            if(errors.errors.filename && errors.errors.filename[0]){
                $('#resumerror').html('Please upload a file !');
            }else{
                $('#resumerror').html('');

            }
        }
       });
    })

</script>
@endsection    