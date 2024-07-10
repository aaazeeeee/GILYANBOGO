<?php 
$title ="Attendance";
include '../db.php';
include 'header.php';
$row = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idno = $_POST ['idNum'];
    $query = "SELECT * FROM regi WHERE idNum = '$idno'";
    $result = $connection->query($query);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    }
}






?>
<form method="POST">
<span> Input ID: </span>
<input type="text" name="idNum"/>
</form>

<div>
    <a href="">Back to Menu</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID#</th>
            <th>Name</th>
            <th>Campus</th>
            <th>Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if($row) : ?>
        <tr>
            <td> <?php echo $row ['idNum'] ?> </td>
            <td> <?php echo $row ['studLname'].$row ['studFname'] ?> </td>
            <td> <?php echo $row ['campus'] ?> </td>
            <td> <?php echo $row ['amountPaid'] ?> </td>
            <td> <a href="edit.php?id= <?php echo $row['id']?>">Edit</a> </td>
            <td> <a href="delete.php?id= <?php echo $row['id']?>">Delete</a> </td>
        </tr>
        <?php else :
              echo "ID NOT YET REGISTERED";
            ?>
        <?php endif;?>
    </tbody>
</table>