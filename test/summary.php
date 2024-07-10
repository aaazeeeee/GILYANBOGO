<?php


include "db.php";

$student = []; 
$total = 0;
$attendes = 0;






   $campus = $_POST ['campus'];
        $query = "SELECT * FROM registration WHERE campus = '$campus'";


    $result = $connection->query($query);
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $student[]= $row;
            $total = $total + $row['amountPaid'];
        if($row['attended'] == 'Yes'){
            $attendes = $attendes +1;
        }
        }

    }



?>

<table>



    <thead>
        <th>Campus</th>
        <th>Registered</th>
        <th>Attended</th>
        <th>Total Collection</th>
        
    </thead>

    <tbody>
        
        <tr>
            <td><?php echo $row ['idNum']?> </td>
            <td><?php echo $row ['studFName'] ." ". $row ['studLName']?> </td>
            <td><?php echo $row ['campus']?> </td>
            <td><?php echo $row ['amountPaid']?> </td>
            <td><?php echo $row ['attended']?> </td>
        </tr>
       
        <tr>
            
        </tr>



    </tbody>




    
</table>


<div> <span> Date Generated: <?php echo date('m/d/Y') ?></span></div>



