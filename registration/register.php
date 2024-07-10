<?php
$title ="Register";
session_start();
include '../db.php';
include 'header.php';

$message = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idno = $_POST['idno'];
        $campus = $_POST['campus'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $amount = $_POST['amount'];
        $attended = $_POST['attended'];

        if ($idno=="" || $campus=="" || $firstname==""|| $lastname=="" || $amount=="" || $attended=="")
    {
        $message = "Fill all fields";


    } else {
            $query="SELECT * FROM regi WHERE idNum = '$idno'";
            $result=$connection->query($query);

        if ($result->num_rows > 0)
            $message="ID number existed";

        else {
        $query ="INSERT INTO regi (idNum, campus, studFname, studLname, amountPaid, attended) VALUES ($idno, '$campus', '$firstname', '$lastname', $amount, '$attended')";


        $result = $connection->query($query);
        $message = "Registered Successfully";
    }
}

}

?>


<style>
    .input {
        display: flex;
        justify-content: space-between;

    }

    .container {
        width: 360px;
    }
</style>

<form class="container" method="POST">
    <?php 
    echo $message
    ?>
    <div class="input">
        <span>ID Number</span>
        <input name="idno"/>
    </div>

    <div class="input">
        <span>Campus</span>
        <input name="campus"/>
    </div>

    <div class="input">
        <span>First Name</span>
        <input name="firstname"/>
    </div>

    <div class="input">
        <span>Last Name</span>
        <input name="lastname"/>
    </div>

    <div class="input">
        <span>Amount Paid</span>
        <input name="amount"/>
    </div>

    <div class="input">
        <span>Attended</span>
        <input name="attended"/>
    </div>

    <div class="">
        <input type="submit" value="Register"/>
    </div>

</form>