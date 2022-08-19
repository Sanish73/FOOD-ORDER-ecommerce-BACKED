<?php include('../config/constant.php');  ?>

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
        <h1 class="text-center secondary-text">Login</h1><br>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            session_unset();
        }
        ?><br><br>

        <form action="" method="POST" class="text-center">
            <label class="bold">UserName:</label><br>
            <input type="text" name="username" placeholder="Enter Username."><br><br>
            <label class="bold">Password:</label><br><br>
            <input type="password" name="password" placeholder="Enter Password."><br><br>
            <input type="submit" name="submit" value="Submit" class="btn-primary">
        </form>
        <br><br>
        <h2>
            <p class="text-center bold primary-text">Food Order System</a></p>
        </h2>
    </div>
</body>

<!-- ------------------PHP---------------- -->
<?php

if (isset($_POST['submit'])) {
    $userName = $_POST['username'];
    $passWord = md5($_POST['password']);

    if (!empty($userName) && !empty($passWord)) {
        $sql = "SELECT * FROM  tbl_admin where username = '$userName' 
              AND
         password = '$passWord'";

        $qry = mysqli_query($conn, $sql) or die("login query  porblem");

        // lets check user exist or not by count
        $count = mysqli_num_rows($qry);

        if ($count == 1) {
            //user is available and login success
            echo ("com");
        } else {
            //user is not available and login is not success
            // give message here
            $_SESSION['login'] = "<div class='text-center primary-text'>Failed To Login!!!</div>";
            //after added we redirect to back page so
            header('location:' . SITEURL . 'admin/login.php');
        }
    }
}

?>