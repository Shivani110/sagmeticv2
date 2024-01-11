@extends('masterlayout.admin.layout')
@section('content')

<style>
    .card-container{
        width: 95%;
        
    }
</style>

<div class="card-container ms-4">
    <h4>Applicant Details</h4>
    <div class="card my-4">
        <div class="card-header">
            Basic Information
        </div>
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="Rahul Sharma" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Email</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="rahul@gmail.com" disabled>
                </div>
                <div class="col-6">
                    <label for="inputAddress" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" disabled>
                </div>
            </form> 
        </div>
    </div>
    <div class="card my-4">
        <div class="card-header">
            Address
        </div>
        <div class="card-body">
        <form class="row g-3">
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="Rahul Sharma" disabled>
            </div>
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Email</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="rahul@gmail.com" disabled>
            </div>
            <div class="col-3">
                <label for="inputAddress" class="form-label">Phone</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" disabled>
            </div>
            <div class="col-3">
                <label for="inputAddress" class="form-label">Phone</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" disabled>
            </div>
            <div class="col-8">
                <label for="inputAddress" class="form-label">Phone</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" disabled>
            </div>
        </form> 
        </div>
    </div>
    <div class="card my-4">
        <div class="card-header">
            Professional Details
        </div>
        <div class="card-body">
        <form class="row g-3">
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="Rahul Sharma" disabled>
            </div>
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Email</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="rahul@gmail.com" disabled>
            </div>
            <div class="col-3">
                <label for="inputAddress" class="form-label">Phone</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" disabled>
            </div>
            <div class="col-3">
                <label for="inputAddress" class="form-label">Phone</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" disabled>
            </div>
            <div class="col-8">
                <label for="inputAddress" class="form-label">Phone</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="PHP Developer.." value="9944826477" disabled>
            </div>
        </form> 
        </div>
    </div>
</div>
@endsection