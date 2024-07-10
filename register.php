<?php
$title = "Register";
session_start();
include 'db.php';
include 'header.php';
if (isset($_SESSION ['user'])){
    header("Location: ./");
}
$message = "";
 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];

        if($username == "" || $name == "" || $lastname == "" || $age == "")
            {
                $message = "Fill all fields";

            } 
            else {
                //use this to nif need 3 pataas ang need e input
                //strlen = string length
                if (strlen($username)>3){
                    $query ="SELECT * FROM user WHERE username = '$username'";
                    $reu = $connection->query($query);
                    
                    if ($reu->num_rows > 0)
                     $message="Username existed";
                    
                    
                    else {
                        $query ="INSERT INTO user (username, name, lastname, age) VALUES('$username', '$name', '$lastname', '$age')";
                        $reu = $connection->query($query); 
                            $message = "Registered Succesfully";
                        
                              
                        }
                }else 
                    $message = " usernanme must be gereater than 3 <br>
                    ";
                
                }
         }
    

?>

<form method="POST">
    <?php
        echo $message;  
    ?>
    <label>Username</label>
    <input name="username"/>
    <label>Name</label>
    <input name="name"/>
    <label>lastname</label>
    <input name="lastname"/>
    <label>Age</label>
    <input name="age"/>
    <input type="submit"/>
</form>

<a href="login.php">Login</a>


