<?php

session_start();
ob_start();

define("SITEURL","http://localhost/Food_Order(ecommerce)/");
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','food-order');



$conn = mysqli_connect(HOST, USER,PASSWORD,DATABASE) or die("Unable to connect");





?>