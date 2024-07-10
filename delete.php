

<?php

session_start();
include 'db.php';

if(!isset($_SESSION['user']))
    header('location: login.php');


if(!isset($_GET['id']))
    header("location: home.php");



    $id = $_GET['id'];

$query = "Delete FROM fruit WHERE id=$id";
$re = $connection->query($query);

echo "Successfully deleted";

?>