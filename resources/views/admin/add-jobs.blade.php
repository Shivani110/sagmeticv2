@extends('masterlayout.admin.layout')
@section('content')

<style>
    .btn-danger{
        border-radius: 0px;
        background-color: red
    }

</style>

<form class="row g-3">
    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Job Title</label>
        <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer..">
    </div>
    <div class="col-md-12">
        <label for="inputPassword4" class="form-label">Description</label>
        <textarea id="froala-editor"></textarea>

    </div>
    <div class="col-6">
        <label for="inputAddress" class="form-label">Job Type</label>
        <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>Part-Time</option>
            <option>Full-Time</option>
        </select>
    </div>
    <div class="col-6">
        <label for="inputAddress2" class="form-label">Skills Required</label>
        <input type="text" class="form-control" id="inputSkills" placeholder="Tags..."  autocomplete="off">
        <ul>
            <li class="row" id="tagslist" >

            </li>
          </ul>
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">Salary</label>
        <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>below 10k</option>
            <option>above 10k</option>
            <option>10k-20k</option>
            <option>above 20k</option>
            <option>No Budget</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="inputState" class="form-label">Required Experirence</label>
        <select id="inputState" class="form-select">
        <option selected>Choose...</option>
        <option>0-1 years</option>
        <option>1-2 years</option>
        <option>more than 2 years</option>
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
     })

     $(document).on('click', '.position-absolute', function() {
        var removedTag = $(this).data('id');
        $tags = $tags.filter(function(tag) {
            return tag !== removedTag;
        });
        $(this).closest('.col-sm-3').remove();
        });

</script>

@endsection