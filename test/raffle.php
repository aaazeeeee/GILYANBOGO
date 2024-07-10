<?php


include "db.php";

$student = null; 

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $query = "SELECT * FROM registration ORDER BY RAND() LIMIT 1";
    $result = $connection->query($query);
    if($result->num_rows>0){
        $student = $result->fetch_assoc();
    }
}



?>

<form method="POST">

    <input  type="submit" value="REVEAL THE LUCKY WINNER"/>
</form>

<?php if ($student):?>
<table>

    <thead>
        <th>ID #</th>
        <th>Name</th>
        <th>Campus</th>
    </thead>

    <tbody>
        
        <tr>
            <td><?php echo $student ['idNum']?> </td>
            <td><?php echo $student ['studFName'] ." ". $student ['studLName']?> </td>
            <td><?php echo $student ['campus']?> </td>
        </tr>
       



    </tbody>




    
</table>


<span>CONGRATULATIONS!</span>

<?php endif ?>