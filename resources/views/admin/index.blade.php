@extends('masterlayout.admin.layout')
@section('content')

<style>
    .card{
        background-color: rgb(0, 225, 255);
        height: 10rem;
        width: 18rem;
    }
</style>

{{-- CARDS START --}}
<div class="row justify-content-center">
    <div class="card mx-3">
        <div class="card-body d-flex align-items-center">
            <i class="ri-group-line" style="font-size: 40px;"></i>
            <div class="ms-auto">
                <h5 class="card-title">Interviews</h5>
                <h2 class="card-subtitle mb-2 text-muted">80</h2>
            </div>
        </div>
    </div>
    <div class="card mx-3">
        <div class="card-body d-flex align-items-center">
            <i class="ri-group-line" style="font-size: 40px;"></i>
            <div class="ms-auto">
                <h5 class="card-title">Applies</h5>
                <h2 class="card-subtitle mb-2 text-muted">50</h2>
            </div>
        </div>
    </div>
    <div class="card mx-3">
        <div class="card-body d-flex align-items-center">
            <i class="ri-suitcase-line" style="font-size: 40px;"></i>
            <div class="ms-auto">
                <h5 class="card-title">Jobs</h5>
                <h2 class="card-subtitle mb-2 text-muted">10</h2>
            </div>
        </div>
    </div>
</div>
{{-- CARDS END --}}
@endsection