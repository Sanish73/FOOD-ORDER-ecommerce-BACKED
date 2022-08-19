<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Order System</title>
    <!-- -----link------- -->
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

    <div class="login">
       <h1 class="text-center">Login</h1><br><br>

       <form action="" class="text-center">
        <label>UserName:</label><br>
        <input type="text" name="username" placeholder="Enter Username." ><br><br>
        <label>Password:</label><br><br>
        <input type="password" name="password" placeholder="Enter Password." ><br><br>
    <input type="submit" name="submit" value="Submit" class="btn-primary">
       </form>
        <br><br>
       <p>Created By- <a href="#">Sanish Thapa</a></p>
    </div>
</body>

<!-- ------------------PHP---------------- -->
<?php

    if(isset($_POST['submit'])){
        $userName = $_POST['username'];
        $passWord = $_POST['password'];

        
    }

?>