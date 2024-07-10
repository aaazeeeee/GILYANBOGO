
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "registration";

$connection = new mysqli($servername, $username, $password, $database);
if(!$connection)
die('errror connecting database');


?>