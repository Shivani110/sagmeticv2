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
.progress{
    rotate: 90deg;
    height: 5px;
    width: 30%;
    margin-top: 15%;
    margin-left: -13%;
    display: none;
}
/* .form-check-input{
  background-color: #8bb58b;
} */

/* .hrclass1{
  background-color: #e0e0e0;
  color: dimgrey;
}
.techclass1{
  background-color: #e0e0e0;
  color: dimgrey;
}
.hiredclass1{
  background-color: #e0e0e0;
  color: dimgrey;
} */

.errorMsgs{
  color: red;
  margin-left: 20px;
}
</style>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{url('admin/jobs')}}">Jobs</a></li>
      <li class="breadcrumb-item active" aria-current="page">Applied</li>
    </ol>
</nav>
<div class="container">
    <div class="showing-jobs d-flex">
        <div>
            <h4>Applicant Status:</h4>
            <p>{{$applicant->name}} | {{$applicant->jobs->title}}</p>
            <strong>Overall Status : {{$interview->interview_status}}</strong>
        </div>
    </div>
    <div class="progress">
        <div class="progress-bar bg-danger" role="progressbar" aria-label="Danger example" style="width:100%"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <form action="{{url('updateInterviewStatus/'.$applicant->id)}}" method="post">
      @csrf
            <div class="row ">
                  <div class="form-check col-12 my-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled/>
                    <label class="form-check-label" for="flexCheckDefault">
                      Invited
                    </label>
                  </div>
                  <div class="form-check col-12 my-2">
                    @if($interview->interview_status != 'Invited')
                    <input class="form-check-input" type="checkbox" name="conducted" id="conducted" value="Interview Conducted" checked disabled>
                    @else
                    <input class="form-check-input" type="checkbox" name="conducted" id="conducted" value="Interview Conducted" >
                    @endif
                    <label class="form-check-label" for="">
                      Interview Conducted
                    </label>
                  </div>
                  <div class="form-check col-8 my-2">
                  <div class="accordion accordion-flush" id="accordionFlushExample">
                   
                      <!-- <input class="hrclass form-check-input" type="checkbox"  value="HR Round" id="hrcheck" > -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                              <button class=" hrclass1 accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" disabled>
                                HR Round
                              </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body row">
                                <div class="col-6">
                                  <label for="">Status</label><br>
                                  @if($interview->interview_status != 'Invited')
                                    <select  class="form-select" name="hrstatus" id="" disabled>
                                    @if($interview->hr_round == 1)
                                      <option value="Pass" selected>Pass</option>
                                    @else
                                      <option value="Fail" selected>Fail</option>
                                    @endif
                                  @else
                                    <select  class="form-select" name="hrstatus" id="" >
                                    <option value="" selected>Select</option>
                                    <option value="Pass">Pass</option>
                                    <option value="Fail">Fail</option>
                                  @endif
                                  </select>
                                </div>
                                <div class="col-6">
                                  <label for="">Remarks</label><br>
                                  @if($interview->hr_round == 1)
                                  <input class="form-control" name="hrremarks" type="text" value="{{$interview->hr_remark ?? ''}}" disabled>
                                  @else
                                  <input class="form-control" name="hrremarks" type="text" value="{{$interview->hr_remark ?? ''}}">

                                  @endif
                                </div>
                              </div>
                            </div>
                            <span class="errorMsgs">
                              @error('hrstatus')
                               Please update the HR round status
                              @enderror
                            </span>
                        </div>
                    </div>
                  </div>
                  <div class="form-check my-2 col-8">
                    <!-- <input class="techclass form-check-input" type="checkbox" value="" id="techcheck" > -->
                    <div class="accordion accordion-flush" id="accordionFlushExample">

                      <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                              <button class=" techclass1 accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" disabled>
                              Technical Round
                              </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body row">
                              <div class="col-6">
                                  <label for="">Status</label><br>
                                  @if($interview->interview_status != 'Invited')
                                    <select  class="form-select" name="techstatus" id="" disabled>
                                    @if($interview->tech_round == 1)
                                      <option value="Pass" selected>Pass</option>
                                    @else
                                      <option value="Fail" selected>Fail</option>
                                    @endif
                                  @else
                                    <select  class="form-select" name="techstatus" id="" >
                                    <option value="" selected>Select</option>
                                    <option value="Pass">Pass</option>
                                    <option value="Fail">Fail</option>
                                  @endif
                                  </select>
                                </div>
                                <div class="col-6">
                                  <label for="">Remarks</label><br>
                                  @if($interview->tech_round == 1)
                                  <input class="form-control" name="techremarks" type="text" disabled>
                                  @else
                                  <input class="form-control" name="techremarks" type="text" >
                                  @endif
                                </div>
                              </div>
                            </div>
                            <span class="errorMsgs">
                              @error('techstatus')
                               Please update the Tech round status
                              @enderror
                            </span>
                        </div>
                  </div>
                </div>
                  <div class="form-check my-2 col-8">
                    <!-- <input class="hiredclass form-check-input" type="checkbox" value="" id="hiredcheck" > -->
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                      <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                              <button class=" hiredclass1 accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" disabled>
                              Hired
                              </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body row">
                              <div class="col-6">
                                  <label for="">Status</label><br>
                                  <select  class="form-select" name="hiredstatus" id="">
                                    <option value="" selected>Select</option>
                                    <option value="Hired">Hired</option>
                                    <option value="Rejected">Rejected</option>
                                  </select>
                                </div>
                                <div class="col-6">
                                  <label for="">Remarks</label><br>
                                  <input class="form-control" name="finalremarks" type="text">
                                </div>
                              </div>
                            </div>
                            <span class="errorMsgs">
                              @error('hiredstatus')
                               Please update the Final status
                              @enderror
                            </span>
                        </div>
                      </div>
                  </div>
                </div>
                  <div class="row">
                    <div class="col-4">
                      <button  type="submit" class="btn btn-danger mx-2">Update</button>
                      <a href="" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                  </div>
                  
                  
      </form>
</div>
<script>
  
</script>
<!-- <script>
  $('#conducted').on('change', function () {
    if ($('.hrclass').prop('disabled')) {
      $('.hrclass').prop('disabled', false);
      $('.techclass').prop('disabled', false);
      $('.hiredclass').prop('disabled', false);
    } else {
      $('.hrclass').prop('disabled', true);
      $('.techclass').prop('disabled', true);
      $('.hiredclass').prop('disabled', true);
    }
  });
 $('#hrcheck').on('change',function(){
  if ($(this).prop('checked')) {
    $('.hrclass1').prop('disabled',false)
    $('.hrclass1').css({'background-color': 'white','color': 'black'})
    $('[name = hrstatus]').prop('disabled', false)
    $('[name = hrremarks]').prop('disabled', false)
  }else{
    $('.hrclass1').prop('disabled', true);
    $('[name = hrstatus]').prop('disabled', true)
    $('[name = hrremarks]').prop('disabled', true)
    $('.hrclass1').css({'background-color': '#e0e0e0','color': 'dimgrey'})
  }
 })
 $('#techcheck').on('change',function(){
  if ($('.techclass1').prop('disabled')) {
    $('.techclass1').prop('disabled',false)
    $('[name = techstatus]').prop('disabled', false)
    $('[name = techremarks]').prop('disabled', false)
    $('.techclass1').css({'background-color': 'white','color': 'black'})
  }else{
    $('.techclass1').prop('disabled', true);
    $('[name = techstatus]').prop('disabled', true)
    $('[name = techremarks]').prop('disabled', true)
    $('.techclass1').css({'background-color': '#e0e0e0','color': 'dimgrey'})
  }
 })
 $('#hiredcheck').on('change',function(){
  if ($('.hiredclass1').prop('disabled')) {
    $('.hiredclass1').prop('disabled',false)
    $('[name = hiredstatus]').prop('disabled', false)
    $('[name = hiredremarks]').prop('disabled', false)
    $('.hiredclass1').css({'background-color': 'white','color': 'black'})
  }else{
    $('.hiredclass1').prop('disabled', true);
    $('[name = hiredstatus]').prop('disabled', true)
    $('[name = finalremarks]').prop('disabled', true)
    $('.hiredclass1').css({'background-color': '#e0e0e0','color': 'dimgrey'})
  }
 })
</script> -->

@endsection