<?php
$title = "Login";
session_start();
include 'db.php';
include 'header.php';
if (isset($_SESSION ['name'])){
    header("Location: ./");
}


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $lastname = $_POST['lastname'];

        if($username == ""  || $lastname =="")
            {
             echo "Fill all fields";
            } else {
                $query ="SELECT * FROM user WHERE username = '$username' AND lastname ='$lastname'";
                $reu = $connection->query($query);
                if ($reu->num_rows > 0) { 
                    $user = $reu->fetch_assoc();
                    $_SESSION['id'] = $user['lastname'];
                    $_SESSION['name'] = $user ['name'];
                    $_SESSION['user'] = $user['id'];

                    header("Location: ./home.php");
                } else {
                    echo "Invalid Username or Password";
                }

            }  
                
    }


?>

<form method="POST">
    <label>Username</label>
    <input type="text" name="username"/>
    <label>Password</label>
    <input type="Password" name="lastname"/>
    <input type="submit" value="Login"/>
  

</form>


