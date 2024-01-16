@extends('masterlayout.admin.layout')
@section('content')

<style>
    .btn{
        border-radius: 0px;
        
       
    }
    .card{
        border-radius: 0px
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Manage Users</li>
    </ol>
</nav>
<div class="container">
    <div class="page-title">
        <h4>User Management</h4>
        <p>Manage User</p>
    </div>
    <div class="row mx-3">
        <?php $users =  App\Models\User::where('role',2)->get(); ?>
        @foreach ($users as $user)
            
        
        <div class="card col-5 mx-2 p-4 d-flex">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="card-title ">
                    <h4>{{$user->name}}</h4>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted">{{$user->email}}</h6>
                </div>
                <div class="col-md-6">

                    <div class="card-body ">
                        <a href="#" class="btn btn-outline-secondary">Edit</a>
                        <a href="#" class="btn btn-outline-danger">Remove</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
  
    </div>
</div>
@endsection