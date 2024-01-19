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
                <form class="row g-3" action="{{url('/careers/'.$job->title.'/application/apply')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputEmail4" name="name" placeholder="Enter Name"  >
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Email</label>
                        <input type="text" class="form-control" id="inputEmail4" name="email" placeholder="Enter Email"  >
                    </div>
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="inputEmail4" name="phone" placeholder="Contact No." >
                    </div>
            </div>
        </div>
        <input type="text" name="filename" id="filename" hidden>
        <input type="text" name="job_id" id="job_id" value="{{$job->id}}" hidden>
        <div class="card my-4 col-4">
               Upload Resume
            
            <div class="row">
                <div class="card-body">
                    <div id="myDropzone" class="dropzone">
                        <div class="dz-message">
                            <p>Drop files here or click to upload.</p>
                        </div>
                    </div>              
                </div>
            </div>
        </div>

          
                <div class="but my-3">
                    <button class="btn btn-danger" type="submit" id="invite">Submit</button>
            </form>
                </div>
    </div>
</section>
<script>
//  $('form').on('submit', function(){
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
                        alert(response);
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

@endsection