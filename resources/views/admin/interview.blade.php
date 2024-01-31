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
.card{
    border-radius: 0px;
    margin:10px
}
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Interviews</li>
    </ol>
</nav>

    <div class="showing-jobs d-flex">
        <div>
            <h4>Interviews</h4>
            <p>Interview List</p>
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
            </div>
        </div>
    </div>
              <div class="card">
                    <div class="card-body">
                        <table class="table card-table" >
                            <tr>
                                
                                <th>Name</th>
                                <th>Position</th>
                                <th>Interview Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            <tbody>
                     <?php $interviews = App\Models\Interview::with('applicant')->get(); ?>
                     @foreach ($interviews as $interview)
                         <?php $job = App\Models\Jobs::where('id',$interview->applicant->job_id)->first();  ?>
                            
                            <tr>
                            <td>{{$interview->applicant->name}}</td>
                            <td>{{$job->title}}</td>
                            <td>{{\Carbon\Carbon::parse($interview->scheduled_at)->format('Y-m-d')}}</td>
                            <td>{{\Carbon\Carbon::parse($interview->scheduled_at)->format('h:i a')}}</td>
                            <td><a href="{{url('admin/applied/'.$job->title.'/'.$interview->applicant->name.'/'.$interview->applicant_id.'/status')}}" class="btn btn-sm btn-outline-danger">{{$interview->interview_status}}</a></td>
                            <td>
                                <div class="btn-group ">
                                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill" style="" ></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{url('admin/applied/wordpress/applicantid=1')}}">Details</a></li>
                                        <li><a class="dropdown-item" href="{{url('admin/applied/'.$job->title.'/'.$interview->applicant->name.'/'.$interview->applicant_id.'/status')}}">Status</a></li>
                                        <li><a class="dropdown-item" href="#">Remove</a></li>
                                    </ul>
                                </div>
                            </td>
                            </tr> 
                            </tbody>
                            @endforeach
                       </table>
                     </div>
                </div>    
@endsection