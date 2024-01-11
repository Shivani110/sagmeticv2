<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css" integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <title>Your Page Title</title>
    <title>Sagmetic ADMIN</title>
    {{-- FROALA TEXT EDITOR --}}
    <link href="{{ asset('froala/css/froala_editor.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/table.min.css')}}">


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
    }
    .sidebar-items{
        color: white;
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
    .list-group-item:hover{
       
        background-color: red;
         border-top-left-radius: 100px;
        border-bottom-left-radius: 100px;
    }
    #mainimage{
        width: 35%;
        margin-left: 6%;
    }
    
</style>
<body>

    <!-- NAVBAR START -->
    
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="col-3">
                <img id="mainimage" src="{{asset('images/sagmetic.svg')}}" alt="">
            </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="p-2"><h5>Dashboard</h5></div>
                    <div class="p-2 ms-auto"><i class="ri-notification-2-line">  </i>   User</div>
                </div>
            </div>
        </nav>

    <!-- NAVBAR END -->


    <div class="row">
     <!-- SIDEBAR START -->
    <div class="sidebar col-3 d-flex flex-column" style="height: 100vh">
        <div class="sidebar-items  ms-5">

            <div class="items mt-4 mb-4">
            <a href="{{url('/')}}" class="list-group-item text-bg-danger   p-2 " aria-current="true" style="border-top-left-radius: 100px;border-bottom-left-radius: 100px;">
               <i class="icons ri-home-2-line"></i> Dashboard
            </a>
            </div>
            <div class="items mt-4 mb-4">
            <a href="{{url('/admin/jobs')}}" class="list-group-item" aria-current="true" style="border-top-left-radius: 100px;border-bottom-left-radius: 100px;">
               <i class="icons ri-suitcase-line"></i> Jobs
            </a>
            </div>
            <div class="items mt-4 mb-4">
            <a href="{{url('/admin/interview')}}" class="list-group-item  " aria-current="true" style="border-top-left-radius: 100px;border-bottom-left-radius: 100px;">
                <i class="icons ri-group-line"></i> Interview
            </a>
            </div> 
            <div class="items mt-4 mb-4">
                <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#userManagementSubMenu" aria-expanded="false" aria-controls="userManagementSubMenu" style="border-top-left-radius: 100px;border-bottom-left-radius: 100px;">
                    <i class="icons ri-team-line"></i> User Management
                </a>
            
                <div class="collapse" id="userManagementSubMenu">
                    <div class="list-group" style="font-size:12px">
                        <a href="{{url('/admin/adduser')}}" class="list-group-item">Add HR</a>
                        <a href="{{url('/admin/manageuser')}}" class="list-group-item">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="items">
                <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#userManagementSubMenu" aria-expanded="false" aria-controls="userManagementSubMenu" style="border-top-left-radius: 100px;border-bottom-left-radius: 100px;">
                    <i class="icons ri-team-line"></i> Log Out
                </a>
            </div>

        </div>
    </div>
    <!-- SIDEBAR END -->


    <!-- MAIN CONTENT -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="{{ asset('froala/js/froala_editor.min.js') }}"></script>
    <script src="{{asset('froala/js/plugins/table.min.js')}}"></script>    
    <script src="{{asset('froala/js/plugins/lists.min.js')}}"></script>    
    <script src="{{asset('froala/js/plugins/font_size.min.js')}}"></script>    
    <script src="{{asset('froala/js/plugins/paragraph_format.min.js')}}"></script>    
    <div class="main-content col-9 mt-4">
            @yield('content')
        </div>
    <!-- MAIN CONTENT END -->
   
</div>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

{{-- <script>
    $('.list-group-item').on('click',function(e){
               $(this).addClass('text-bg-primary active');

    })
</script> --}}
</body>
</html>
