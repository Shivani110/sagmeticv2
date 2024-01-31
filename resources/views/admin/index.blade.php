@extends('masterlayout.admin.layout')
@section('content')

<style>
    .card{
        color: white;
        height: 10rem;
        width: 18rem;
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
</nav>
{{-- CARDS START --}}
<div class="row justify-content-center">
    <div class="card mx-3" style="background-color: black">
        <div class="card-body d-flex align-items-center">
            <i class="ri-group-line" style="font-size: 40px;"></i>
            <div class="ms-auto">
            <?php  $interviews = App\Models\Interview::all();?>

                <h5 class="card-title">Interviews</h5>
                <h2 class="card-subtitle mb-2 ">{{$interviews->count()}}</h2>
            </div>
        </div>
    </div>
    <div class="card mx-3" style="background-color: red">
        <div class="card-body d-flex align-items-center">
            <i class="ri-group-line" style="font-size: 40px;"></i>
            <div class="ms-auto">
            <?php  $applied = App\Models\JobsApplied::all();?>
                <h5 class="card-title">Applies</h5>
                <h2 class="card-subtitle mb-2 ">{{$applied->count()}}</h2>
            </div>
        </div>
    </div>
    <div class="card mx-3" style="background-color: blue">
        <div class="card-body d-flex align-items-center">
            <i class="ri-suitcase-line" style="font-size: 40px;"></i>
            <div class="ms-auto">
                <h5 class="card-title">Jobs</h5>
                <?php  $jobs = App\Models\Jobs::all();?>
                <h2 class="card-subtitle mb-2 ">{{$jobs->count()}}</h2>
            </div>
        </div>
    </div>
</div>
{{-- CARDS END --}}
@endsection