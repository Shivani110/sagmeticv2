<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
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

.login-container input[type="text"], .login-container input[type="password"] {
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
</style>
<body>

    <div class="login-container">
        <h1>Admin Login</h1>
        <form action="{{url('admin/login')}}" method="post">
            @csrf
            <label for="username">Email:</label>
            <input type="text" id="username" name="useremail" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>