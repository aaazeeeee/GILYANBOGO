<?php 

session_start();
include '../db.php';


$message= "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)) {
        $message = 'FIll all fields';
    }else {
        $query = "SELECT * FROM users WHERE name = '$username'";
        $result = $connection->query($query);

        if($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if($user['password'] == $password){
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
            }else {
                $message = 'Invalid Account / Incorrect Password';
            }
           
        }else
        $message = 'Invalid Account / Inccorect Password';
    }
}

?>

<form method="post">
    <?php echo $message;?>
    <div>
        <label>Username</label>
        <input type="text" name="username"/>
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password"/>
    </div>
    <input type="submit" value="Login"/>
</form>

