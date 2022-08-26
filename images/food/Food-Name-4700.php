<?php

$servername = "localhost";
$username = "root";
$password = "";

$con = new mysqli($servername , $username , $password);

if($con->connect_error){
    die("Connection failed");
}

?>