@extends('masterlayout.admin.layout')
@section('content')

<style>
        .btn-outline-danger{
        border-radius: 0px;
        width: 150px
       
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">add user</li>
    </ol>
</nav>
<div class="page-title">
    <h4>User Management</h4>
    <p>Add HR</p>
</div>

<form class="row g-3">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Name</label>
        <input type="text" class="form-control" id="inputEmail4" placeholder="Enter Name">
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Phone</label>
        <input type="text" class="form-control" id="inputEmail4" placeholder="Contact no...">
    </div>
    <div class="col-6">
        <label for="inputAddress" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="abc@gmail.com">
    </div>
    <div class="col-6">
        <label for="inputAddress2" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputSkills" placeholder="Enter Password"  autocomplete="off">
    </div>
    <div class="col-5">
    <button class="btn btn-outline-danger">Save</button>
    </div>
</form>
@endsection