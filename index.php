<?php
session_start();
$title = 'Index';
include 'db.php';
include 'header.php';
$message ='WELCOME';

if (isset ($_SESSION ['user'])){
    echo $message; $_SESSION ['name'];
} 

?>

<a href="logout.php">Logout</a>
