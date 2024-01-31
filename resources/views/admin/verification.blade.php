<!DOCTYPE html>
<html>
<head>
    <title>Verify Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .login-container {
            width: 300px;
            padding: 16px;
            background-color: #ffffff;
            margin: 0 auto;
            margin-top: 100px;
            box-shadow: 0px 0px 5px 0px #ccc;
        }

        .login-container h1 {
            text-align: center;
            color: #4a4a4a;
            margin-bottom: 24px;
        }

        .login-container label {
            display: block;
            margin-bottom: 4px;
        }

        .login-container input[type="number"]{
            width: 100%;
            padding: 8px;
            margin-bottom: 24px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            outline: none;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #c51e1e;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover {
            background-color: #ff0101;
        }

        .resend{
            background-color: #5F9EA0;
            border: none;
            width: 40%;
            padding: 4px;
        }

        .exp_msg{
            color: #ff0101;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Verification code</h1>
        <form action="{{ url('admin/verified') }}" method="post">
            @csrf
            <label for="otp">OTP</label>
            <input type="number" id="otp" name="otp" required>
            <input type="submit" value="Verify">
        </form>
        <div id="myTimer"></div>
        <div class="btn" style="display:none">
            <button class="resend" type="button" onclick="resendOTP()">Resend OTP</button>
        </div>
        <div class="msg"></div>
        @if($message = Session::get('success'))
            <div class="success">
            {{ $message }}
            </div>
        @elseif($message = Session::get('error'))
            <div class="error">
            {{ $message }}
            </div>
        @endif
    </div>

    <script>
        // $(document).ready(function(){
        
            var timer = 60;
            function countdown(){
                timer-- ;

                if(timer > 0){
                    minutes = Math.floor(timer / 60) % 60;
                    sec = Math.floor(timer) % 60;
                    min = minutes;
                    s = sec;
                    var time = '<p>Time left :'+minutes+':'+sec+'</p>';
                    $('#myTimer').html(time);
                    setTimeout(countdown,1000);
                }else{
                    $('#myTimer').html('<p class="exp_msg">Code is expired.</p>');
                    $('.btn').show();
                }
            }

            countdown();

            function resendOTP(){
                var data = {
                    _token: "{{ csrf_token() }}",
                }
                $.ajax({
                    url: "{{ url('admin/resendotp') }}",
                    type: "POST",
                    data: data,
                    dataType:"JSON",
                    success: function(response){
                        if(response){
                            location.reload();
                        }
                    }
                });
            };
        // });

        
    </script>
</body>
</html>