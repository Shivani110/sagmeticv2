@extends('masterlayout.admin.layout')
@section('content')

<style>
    .btn-danger{
        border-radius: 0px;
        background-color: red
    }

</style>
<?php  global $editMode;?>
<div class="row ">
    <div class="col-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('admin/jobs')}}">Jobs</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add job</li>
        </ol>
    </nav>
    </div>
    @if($editMode == true)
    @dd('on')
    @endif
    <div class="col-8 d-flex justify-content-end ">
        <button class="btn btn-dark mx-2" onclick="editMode()"><i class="ri-edit-2-line"></i></button>
    </div>
</div>
<form class="row g-3" method="POST" action="{{url('/add-job')}}">
    @csrf
    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Job Title</label>
        <input type="text" class="form-control" id="inputEmail4" name="title" placeholder="PHP Developer.." value="{{$job->title}}" disabled>
    </div>
    <div class="col-md-12">
        
        <label for="inputPassword4" class="form-label">Description</label>
        {{-- <div class="card">
            <div class="card-body">

                
            </div>
        </div> --}}
        <div class="editor" aria-disabled="#froala-editor">
        <textarea name="" id="froala-editor"  readonly>{{ $job->description}}</textarea>
    </div>
    </div>
    <div class="col-6">
        <label for="inputAddress" class="form-label">Job Type</label>
        <select id="inputState" class="form-select" name="jobtype" disabled>
            <option selected value="{{$job->job_type}}">{{$job->job_type}}</option>
            <option value="Part-Time">Part-Time</option>
            <option value="Full-Time">Full-Time</option>
        </select>
    </div>
    <div class="col-6">
        <label for="inputAddress" class="form-label">Department</label>
        <select id="inputState" class="form-select" name="department" disabled>
            <option selected value="{{$job->department}}">{{$job->department}}</option>
            <option value="IT">IT</option>
            <option value="Bidding">Bidding</option>
            <option value="BDE">BDE</option>
        </select>
    </div>
    <div class="col-8">
        <label for="inputAddress2" class="form-label">Skills Required</label>
        <input type="text" class="form-control" id="inputSkills" placeholder="Tags..."  autocomplete="off" disabled>
        <input type="text" id="Skills" name="skills" hidden>
        <ul>
            <li class="row" id="tagslist" >
                <?php $skills = explode(',',$job->skills) ?>
               @foreach ($skills as $skill)
                   
               <div class="col-sm-3 mt-3">
                   <button type="button" class="btn btn-sm btn-dark position-relative" >{{$skill}}
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark" data-id="">
                        <i class="ri-close-circle-line"  style="cursor:pointer"> </i>
                        <span class="visually-hidden">unread messages</span>
                    </span></button>
                    </div>
                @endforeach
            </li>
          </ul>
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">Salary</label>
        <select id="inputState" class="form-select" name="salary" disabled>
            <option selected value="{{$job->salary}}">{{$job->salary}}</option>
            <option value="below 10k">below 10k</option>
            <option value="above 10k">above 10k</option>
            <option value="10k-20k">10k-20k</option>
            <option value="above 20k">above 20k</option>
            <option value="No Budget">No Budget</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="inputState" class="form-label">Required Experience</label>
        <select id="inputState" class="form-select" name="experience" disabled>
        <option selected value="{{$job->experience}}">{{$job->experience}}</option>
        <option value="0-1 years">0-1 years</option>
        <option value="0-2 years">1-2 years</option>
        <option value="above 2 years">above 2 years</option>
        </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-danger">Save</button>
    </div>
</form>

{{--########## TEXT EDITOR ##########--}}
<script>
    var editor = new FroalaEditor('#froala-editor', {
        toolbarButtons: ['undo', 'redo', '|', 'bold', 'italic', 'underline', '|', 'formatOL','formatUL','paragraphFormat'],
   
    }) 
    editor._editor.edit.off();

</script>
{{-- ########## TAGS FUNCTIONALITY ##########  --}}
<script> 
 var $tags = []
     $('#inputSkills').on('keydown',function(e){
        if(e.keyCode === 32){
        
            value = $(this).val().trim();
            if(value != ''){
                $tags.push(value)
                $('#tagslist').append('<div class="col-sm-3 mt-3"><button type="button" class="btn btn-sm btn-dark position-relative">'+ value +' '+ '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark" data-id="'+value+'"><i class="ri-close-circle-line"  style="cursor:pointer"> </i><span class="visually-hidden">unread messages</span></span></button></div>')
                $(this).val('')     
            }
        }
        $('#Skills').val($tags);
     })

     $(document).on('click', '.position-absolute', function() {
        var removedTag = $(this).data('id');
        $tags = $tags.filter(function(tag) {
            return tag !== removedTag;
        });
        $('#Skills').val('');
        $('#Skills').val($tags);
        $(this).closest('.col-sm-3').remove();
        });

</script>

{{-- ########## EDIT MODE  ########## --}}
<script>    
    function editMode(){
        $editMode = true;
    }
</script>

@endsection