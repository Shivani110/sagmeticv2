<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="Z3P2ZSjBqYcKEoDS58H0qR1tQbBQexgBB596IUxmZ1c" />
    <title>Sagmetic Admin</title>
    <link rel="icon" type="image/x-icon" href="{{asset('website_frontend/images/favicon.png')}}"> 

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css" integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <title>Sagmetic Admin</title>
    {{-- FROALA TEXT EDITOR --}}
    <link href="{{ asset('froala/css/froala_editor.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/table.min.css')}}">
    {{-- FLATPICKR --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- iziToast --}}
    <link rel="stylesheet" href="{{asset('iziToast/css/iziToast.min.css')}}">

</head>
<style>
    body{
        background-color: #ecf5f5;
    }
    .navbar{
        background-color: white;
    }
    .sidebar{
        background-color: black;
        position: fixed;
    }
    .sidebar-items{
        color: white;
    }
    .main-content{
        margin-left: auto
    }
    .icons{
        font-size: 20px;
    }
    .list-group-item{
        padding: 10px;
    }
    /* a .list-group-item{

    } */
    .selectedtab{
        background-color: red;
        
    }
    .listitems:hover{
       
        background-color: red;
         border-top-left-radius: 100px;
        border-bottom-left-radius: 100px;
    }
    #mainimage{
        width: 35%;
        margin-left: 6%;
    }
    .manage-items{
        background: none;
        color:red;
        border: none;
    }

    
</style>
<body>
    @if(request()->is('admin/home'))
        <style>
            #dashboardtab{
                background-color: red
            }
        </style>
    @elseif(request()->is('admin/jobs*'))
    <style>
        #jobstab{
            background-color: red
        }
    </style>
    @elseif(request()->is('admin/interview*'))
    <style>
        #interviewtab{
            background-color: red
        }
    </style>
    @elseif(request()->is('admin/adduser') || request()->is('admin/manageuser'))
    <style>
        #usertab{
            background-color: red
        }
    </style>
    
    @endif
    <!-- NAVBAR START -->
    
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container-fluid">
                <div class="col-3">
                <img id="mainimage" src="{{asset('images/sagmetic.svg')}}" alt="">
            </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="row collapse navbar-collapse" id="navbarNav">
                    <div class="col-10 p-2"><h5>Dashboard</h5></div>
                    <div class="col-1 p-2 d-flex justify-content-end align-items-center"><i class="ri-notification-2-line mx-2" style="font-size: 20px;cursor: pointer;"> </i> 
                        <div class="btn-group ms-auto">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-account-circle-fill " style="font-size: 50px;cursor: pointer;"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">{{Auth::user()->name}}</li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Applied</a></li>
                                <li><a class="dropdown-item" href="{{url('/admin/logout')}}">Logout</a></li>
                            </ul>
                        </div> 
                    </div>
                </div>
            </div>
        </nav>

    <!-- NAVBAR END -->


    <div class="row">
     <!-- SIDEBAR START -->
    <div class="sidebar col-3 d-flex flex-column" style="height: 100vh">
        <div class="sidebar-items  ms-5">

            <div class="items mt-4 mb-4">
               
                    <a href="{{ url('/admin/home') }}" id="dashboardtab" class="listitems list-group-item p-2" aria-current="true" style="border-top-left-radius: 100px; border-bottom-left-radius: 100px;">

                    <i class="icons ri-home-2-line"></i> Dashboard
                </a>
            </div>
            
            <div class="items mt-4 mb-4">
            <a href="{{url('/admin/jobs')}}" id="jobstab" class="listitems list-group-item" aria-current="true" style="border-top-left-radius: 100px;border-bottom-left-radius: 100px;">
               <i class="icons ri-suitcase-line"></i> Jobs
            </a>
            </div>
            <div class="items mt-4 mb-4">
            <a href="{{url('/admin/interview')}}" id="interviewtab" class="listitems list-group-item  " aria-current="true" style="border-top-left-radius: 100px;border-bottom-left-radius: 100px;">
                <i class="icons ri-group-line"></i> Interview
            </a>
            </div> 
            @if(Auth::user()->role == 1)
            <div class="items mt-4 mb-4">
                <a href="#" id="usertab" class="listitems list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#userManagementSubMenu" aria-expanded="false" aria-controls="userManagementSubMenu" style="border-top-left-radius: 100px;border-bottom-left-radius: 100px;">
                    <i class="icons ri-team-line"></i> User Management
                </a>
            
                <div class="collapse" id="userManagementSubMenu">
                    <div class="list-group" style="font-size:12px;margin-left:30px">
                        <a href="{{url('/admin/adduser')}}" class="manage-items list-group-item">Add HR</a>
                        <a href="{{url('/admin/manageuser')}}" class="manage-items list-group-item">Manage Users</a>
                    </div>
                </div>
            </div>
            @endif
            <div class="items">
                <a href="{{url('/admin/logout')}}" class="list-group-item list-group-item-action" style="border-top-left-radius: 100px;border-bottom-left-radius: 100px;">
                    <i class="ri-logout-box-line"></i>     Log Out
                </a>
            </div>
        </div>
    </div>
    <!-- SIDEBAR END -->

    {{-- SCRIPTS --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('froala/js/froala_editor.min.js') }}"></script>
    <script src="{{asset('froala/js/plugins/table.min.js')}}"></script>    
    <script src="{{asset('froala/js/plugins/lists.min.js')}}"></script>    
    <script src="{{asset('froala/js/plugins/font_size.min.js')}}"></script>    
    <script src="{{asset('froala/js/plugins/paragraph_format.min.js')}}"></script>   
    <script src="{{asset('iziToast/js/iziToast.min.js')}}" type="text/javascript"></script> 

    <!-- MAIN CONTENT -->
    <div class="main-content col-9 mt-4">
            @yield('content')
    </div>
    <!-- MAIN CONTENT END -->
   
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@if(session('success'))
<script>
        iziToast.success({
        title: 'Success',
        position: 'topRight',
        message: "{{session('success')}}",
        });
</script>
@endif
@if(session('error'))
<script>
        iziToast.error({
        title: 'Error',
        position: 'topRight',
        message: "{{session('error')}}",
        });
</script>
@endif
</body>
</html>
