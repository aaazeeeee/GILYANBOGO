<?php
session_start();
include '../db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST ['name'];
    $password = $_POST ['password'];

if ($name == "" || $password == ""){
    echo 'Fill all fields';
    } else {
    
    $query = "SELECT * FROM users WHERE name = '$name'";
    $asd = $connection->query($query);
    
    if ($asd->num_rows > 0){
        echo 'Name existed';
    }else{


    $query = "INSERT INTO users (name, password) VALUES ('$name', '$password')";
    $asd = $connection->query($query);
    if ($asd){
        echo 'Registered Succesfully';
          }
        }
    }

}

?>


<form method="POST">
    <label>Name</label>
    <input type="text" name="name"/>
    <label>Password</label>
    <input type="password" name="password"/>
    <input type="submit" value="Register"/>




</form>