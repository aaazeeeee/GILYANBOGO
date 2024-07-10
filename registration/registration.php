<?php 
$title = "Registration";
include 'header.php';
session_start();
include '../db.php';

$students = [];





$query = "SELECT * FROM regi";
$result = $connection->query($query);
if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        $students[]= $row;
    }
}












?>

<style>

.box {
    display: flex;
    gap: 25px;
}
.table{
    gap: 25px;
}

</style>

<div class="box">
    <a href="register.php">Register a Student Here</a>
    <span> | </span>  
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
        <?php
        // pnanlitan need nimo ang total number of students or rows from the database
        // and imo gamiton nga function kay count() ang isulod sa parenthesis kay dapat
        // array
       // if(count($students) > 0) :
        foreach($students as $row) : ?>
        <tr>
            <td> <?php echo $row ['idNum'] ?> </td>
            <td> <?php echo $row ['studLname'].$row ['studFname'] ?> </td>
            <td> <?php echo $row ['campus'] ?> </td>
            <td> <?php echo $row ['amountPaid'] ?> </td>
            <td> <a href="edit.php?id= <?php echo $row['id']?>">Edit</a> </td>
            <td> <a href="delete.php?id= <?php echo $row['id']?>">Delete</a> </td>
        </tr>

        <?php endforeach;
        ?>
    </tbody>
</table>