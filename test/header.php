<?php

include "db.php";
$student = null;








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
        <th> Campus </th>
        <th>Amount</th>
        <th>Action</th>
    </thead>

    <tbody>
        <?php if ($student):?>
        <tr>
            <td><?php echo $student ['idNum']?> </td>
            <td><?php echo $student ['studFName'] ." ". $student ['$studLname']?> </td>
            <td><?php echo $student ['campus']?> </td>
            <td><?php echo $student ['amountPaid']?> </td>
            <e> <?php if ($student ['attended'] == 'Yes' ): ?>  Attended <?php else: ?>  <?php endif ?>  </td>


        </tr>


        <?php endif ?>



    </tbody>

    
</table>