<?php


// this check the session first created from login.php ...this checks the user is availabel or not
    if(!isset($_SESSION['user'])){
            $_SESSION['user-not-login']= "<div class='text-center primary-text'>Please Login First!!</div>";
            header('location:'.SITEURL.'admin/login.php');
    }

?>