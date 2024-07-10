<?php

session_start();
include '../db.php';
if (isset($_SESSION['id']))
    header("Location: ./index.php");

$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($username) || empty($password)) {
        $message = '<span class="warning">Fill all fiedls</span>';
    } else {

        $query = "SELECT * FROM users WHERE name = '$username'";
        $result = $connection->query($query);

        if ($result->num_rows > 0) {

            $message = '<span class="error">Username already exist</span>';
        } else {

            if(strlen($password) > 5) {
            $query = "INSERT INTO users (name, password) VALUES('$username','$password')";
            $connection->query($query);
            $message = '<span class="success">Registered successfully</span>';
            }else {
                $message = "Password length must be greater than 5";
            }
        }
    }
}

?>

<style>
    .warning {
        color:orange;
    }
    .error {
        color:red;
    }
    .success {
        color: green;
    }
</style>


<form method="post">
    <?php echo $message;?>
    <div>
        <label>Username</label>
        <input type="text" name="username" />
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password" />
    </div>
    <input type="submit" value="register"/>
</form>