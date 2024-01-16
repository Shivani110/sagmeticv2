@extends('masterlayout.admin.layout')
@section('content')

<style>
    .btn-outline-danger{
        border-radius: 0px;
        width: 150px; 
    }
    .errormsgs{
        color: red;
        margin-left: 2%
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

{{-- ########### ADD USER FORM ############ --}}

<form class="row g-3" action="{{url('/add-user')}}" method="POST">
    @csrf
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Name</label>
        <input type="text" class="form-control" name="username"  id="inputEmail4" placeholder="Enter Name">
    <span class="errormsgs">
        @error('username')
             {{$message}}
        @enderror
    </span>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Phone</label>
        <input type="tel" class="form-control" name="userphone" id="inputEmail4" placeholder="Contact no..." minlength="10" min="10" max="10">
    <span class="errormsgs">
        @error('userphone')
            The Phone field is required.
        @enderror
    </span>
    </div>
    <div class="col-6">
        <label for="inputAddress" class="form-label">Email</label>
        <input type="email" class="form-control" name="useremail" id="inputEmail4" placeholder="abc@gmail.com">
    <span class="errormsgs">
        @error('useremail')
                {{$message}}
        @enderror
    </span>
    </div>
    <div class="col-6">
        <label for="inputAddress2" class="form-label">Password</label>
        <input type="password" class="form-control" name="userpassword" id="inputSkills" placeholder="Enter Password"  autocomplete="off">
    <span class="errormsgs">
        @error('userpassword')
                {{$message}}
        @enderror
    </span>
    </div>
    <div class="col-5">
    <button class="btn btn-outline-danger">Save</button>
    </div>
</form>
@endsection