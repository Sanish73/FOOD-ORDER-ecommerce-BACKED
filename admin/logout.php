<?php
include('partials/menu.php');
    // 1. Destroying the session and redirecting to login page
    session_destroy();//this is where login sesssion['user'] gests unset.

    header('location:'.SITEURL.'admin/login.php');
?>