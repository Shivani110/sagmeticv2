@extends('masterlayout.admin.layout')
@section('content')

<style>
    .btn-danger{
        border-radius: 0px;
        background-color: red
    }

</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{url('admin/jobs')}}">Jobs</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add job</li>
    </ol>
</nav>
<form class="row g-3" method="POST" action="{{url('/add-job')}}" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Job Title</label>
        <input type="text" class="form-control" id="inputEmail4" name="title" placeholder="PHP Developer..">
    </div>
    <div class="col-md-4">
        <label for="inputEmail4" class="form-label">Job Icon</label>
        <input type="file" class="form-control" id="inputEmail4" name="icon">
    </div>
    <div class="col-md-12">
        <label for="inputPassword4" class="form-label">Description</label>
        <textarea id="froala-editor" name="description"></textarea>

    </div>
    <div class="col-6">
        <label for="inputAddress" class="form-label">Job Type</label>
        <select id="inputState" class="form-select" name="jobtype">
            <option value="Full-Time">Full-Time</option>
            <option value="Part-Time">Part-Time</option>
        </select>
    </div>
    <div class="col-6">
        <label for="inputAddress" class="form-label">Department</label>
        <select id="inputState" class="form-select" name="department">
            <option value="IT">IT</option>
            <option value="Bidding">Bidding</option>
            <option value="BDE">BDE</option>
        </select>
    </div>
    <div class="col-8">
        <label for="inputAddress2" class="form-label">Skills Required</label>
        <input type="text" class="form-control" id="inputSkills" placeholder="Tags..."  autocomplete="off" >
        <input type="text" class="form-control" id="Skills" placeholder="Tags..."  autocomplete="off" name="skills" hidden>
        <ul>
            <li class="row" id="tagslist" >

            </li>
          </ul>
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">Salary</label>
        <select id="inputState" class="form-select" name="salary">
            <option value="below 10k">below 10k</option>
            <option value="above 10k">above 10k</option>
            <option value="10k-20k">10k-20k</option>
            <option value="above 20k">above 20k</option>
            <option value="No Budget">No Budget</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="inputState" class="form-label">Required Experience</label>
        <select id="inputState" class="form-select" name="experience">
        <option value="0-1 years">0-1 years</option>
        <option value="0-2 years">1-2 years</option>
        <option value="above 2 years">above 2 years</option>
        </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-danger">Post Job</button>
    </div>
</form>

{{-- TEXT EDITOR --}}
<script>
    new FroalaEditor('#froala-editor', {
        toolbarButtons: ['undo', 'redo', '|', 'bold', 'italic', 'underline', '|', 'formatOL','formatUL','paragraphFormat']


    }) 
</script>
{{-- TAGS FUNCTIONALITY  --}}
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

@endsection