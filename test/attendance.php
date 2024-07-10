<?php

include "db.php";
$student = null;



if ($_SERVER ['REQUEST_METHOD']  == 'POST'){
    $idNum = $_POST ['idNum'];


    $query = "SELECT * FROM registration WHERE idNum = $idNum";
    $result = $connection->query($query);
    if($result->num_rows>0){
        $student = $result->fetch_assoc();
    }
}


?>

<form method="POST">
<label>
    Input ID #: 
</label>

<input name="idNum" type="number"/>

<a href="menu.php"> Back to Menu </a>
</form>

<table>

    <thead>
        <th>ID #</th>
        <th>Name</th>
        <th>Campus</th>
        <th>Amount</th>
        <th>Action</th>
    </thead>

    <tbody>
        <?php if ($student):?>
        <tr>
            <td><?php echo $student ['idNum']?> </td>
            <td><?php echo $student ['studFName'] ." ". $student ['studLName']?> </td>
            <td><?php echo $student ['campus']?> </td>
            <td><?php echo $student ['amountPaid']?> </td>
            <td> <?php if ($student ['attended'] == 'Yes' ): ?>  Attended <?php else: ?>  <?php endif ?>  </td>


        </tr>
            <?php elseif ($_SERVER ['REQUEST_METHOD'] == 'POST' && $student==null): echo "ID NOT YET REGISTERED" ?>
        <?php endif ?>



    </tbody>




    
</table>


