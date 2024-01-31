@extends('masterlayout.website_frontend.layout')
@section('content') 

<section class="trending-sec mt_10" id="banner" >
    <div class="container">
    <div class="trending-content">
    <div class="head-sub justify-content-center">
                <h2 class="text-center">{{$job->title ?? ''}}・{{$job->department ?? ''}}</h2>
                <p class="text-center">HOME | <a href="{{url('/careers')}}" style="color: red;">CAREERS</a> | <span style="color: red;">{{$job->title ?? ''}}・{{$job->department ?? ''}}</span> </p>
    </div>
    <div class="jobdescblock">
        <div class="red-heading top-heading aos-init aos-animate" data-aos="zoom-in-up">
          <h5>Roles & Responsibilties</h5>
        </div>
        <div class="head">
            <h2>What candidate Should have:</h2>
            
        </div>
        <div class="row">

            <div class="job-description col-lg-6">
                <?php echo $job->description?>
                <div class="skills-list ">
                <h2>Skills</h2>
                <ul class="ulSkills">
                <?php $skills = explode(',',$job->skills); ?>
                    @foreach ($skills as $index => $skill)
                    <li class="skillsLists">{{$skill ?? ''}}</li>
                    @endforeach
                </ul>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4>APPLICATION FORM</h4>
                    <div class="card-text my-3">
                        Department : {{$job->department ?? ''}}
                    </div>
                    <hr>
                    <div class="card-text my-3">
                        Job Type : {{$job->job_type ?? ''}}  
                    </div>
                    <hr>
                    <div class="card-text my-3">
                        Experience : {{$job->experience ?? ''}}
                    </div>
                    <hr>
                    <div class="card-text my-3">
                        Salary : {{$job->salary ?? ''}}
                    </div>
                    <hr>
                    <div class="card-text mt-3">
                        Date Posted : {{$job->created_at->format('Y-m-d') ?? ''}}
                    </div>
                    <p id="submitMsg" class='mt-2' style="color: darkolivegreen;"></p>
                    <div class="button">
                        <a href="#" class="btn" id="applyNow">Apply Now <img id="applyNowArrow" style="padding: 0px;" class="img-fluid mx-2" src="https://sagmetic.com/v2/public/website_frontend/images/button-polygon.svg" alt=""></a>
                    </div>
                </div>
                </div>
                <div id="applicationForm" class="card" style="display:none;" >
                
                <div class="card-body">
                    <form class="" id="jobapplyform" enctype="multipart/form-data">
                        @csrf
                        <div class="floating-label-group">
                            <input  type="text" class="form-control" id="username" name="name" required>
                            <label for="username" class="form-label floating-label">Name</label>
                            <span class="errormsgs" style="color: red;"></span>
                        </div>
                        <div class="floating-label-group">
                            <input  type="email" class="form-control" id="useremail" name="email" required>
                            <label for="useremail" class="form-label floating-label">Email</label>
                            <span class="errormsgs" style="color: red;"></span>
                        </div>
                        <div class="floating-label-group">
                            <input  type="text" class="form-control" id="userphone" name="phone" required>
                            <label for="userphone" class="form-label floating-label">Phone</label>
                            <span class="errormsgs" style="color: red;"></span>
                        </div>
                        <input type="text" name="filename" id="filename" hidden>
                        <input type="text" name="job_id" id="job_id" value="{{$job->id}}" hidden>
                        <div class="resumeUploads" id="resumeUploadfile">
                            <label for="" class="floating-label"> Upload Resume</label>
                            <div class="">
                                <div class="card-body">
                                    <div id="myDropzone" class="dropzone">
                                        <div class="dz-message">
                                            <p>Drop files here or click to upload.</p>
                                        </div>
                                    </div>              
                                </div>
                            </div>
                            <span class="errormsgs" id="resumerror" style="color: red;"></span>
                            <div class="button">
                                <button class="btn" type="submit" id="invite">Submit <img id="applyNowArrow" style="padding: 0px;" class="img-fluid mx-2" src="https://sagmetic.com/v2/public/website_frontend/images/button-polygon.svg" alt=""></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                    <span class="errormsgs" style="color: red;"></span>

            
            </div>
        </div>

        </div>
      </div>
    </div>
</section>
<script>
    $('#applyNow').on('click', function(e) {
        e.preventDefault();
        if ($('#applicationForm').is(':visible')) {
            $('#applicationForm').hide();
            $('#applyNowArrow').css({
                'transform': 'rotate(0deg)',
            });
        } else {
            $('#applicationForm').show();
            $('#applyNowArrow').css({
                'transform': 'rotate(90deg)',
            });}
    });
</script>
<!-- #################  JOB APPLICATION SUBMIT ######################### -->

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
            $('#applicationForm').hide();
            $('#applyNowArrow').css({
                'transform': 'rotate(0deg)',
            });
            $('#submitMsg').html('Job application submitted successfully !');
            iziToast.success({
            title: 'Success',
            position: 'topRight',
            message: "Job application submitted Successfully !",
            });
        },
        error: function(xhr, status, error) {
            $('#submitMsg').html('');

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