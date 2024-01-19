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
      <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Jobs</li>
    </ol>
</nav>

    <div class="showing-jobs d-flex">
        <div>
            <h4>Jobs</h4>
            <?php $jobs = App\Models\Jobs::all(); ?>
            <p>Showing {{$jobs->count()}} Jobs</p>
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
                    @foreach ($jobs as $job)
                        
                    <tr>
                        
                        <td><img src="{{asset('images/jobicons/'.$job->icon_url)}}" alt="" width="50px"> {{$job->title}}</td>
                        <td>{{$job->salary}}</td>
                        <td>{{$job->created_at}}</td>
                        <td>{{$job->experience}}</td>
                        <?php $count = App\Models\JobsApplied::where('job_id',$job->id)->count() ?>
                        <td><a href="{{url('/admin/jobs/'.$job->title.'/applied')}}" class="btn btn-sm btn-outline-danger px-4">{{$count}}</a></td>
                        <td>
                            <div class="btn-group ">
                                <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-2-fill" style="" ></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{url('/admin/jobs/'.$job->title.'/details')}}">Details</a></li>
                                        <li><a class="dropdown-item" href="{{url('/admin/jobs/'.$job->title.'/applied')}}">Applied</a></li>
                                        <li><a class="removeJob dropdown-item"  href="#" data-id="{{$job->id}}">Remove</a></li>
                                    </ul>
                                </div>  
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
{{-- Delete a job posting --}}
<script>
    $('.removeJob').on('click',function () {
        id = $(this).data('id');
        
        if(confirm('Do you Want to delete this Job Posting ?')){
         $(this).closest('tr').remove();
         $.ajax({
             type: "get",
             url: "{{url('/removeJob')}}",
             data: {
                 id:id,
             },
             success: function (response) {
                 iziToast.success({
                    title: 'Job Listing Removed'
                 })
             }
         });
        }
       
      })
</script>
@endsection