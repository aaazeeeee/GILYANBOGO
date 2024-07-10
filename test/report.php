<?php


include "db.php";

$student = []; 
$total = 0;
$attendes = 0;



if($_SERVER['REQUEST_METHOD'] == 'POST'){


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

}



?>

<form method="POST">



<label>Main</label>
<input type="checkbox" name="campus" checked value="Main"/>
<label>Banilad</label>
<input type="checkbox" name="campus" value="Banilad"/>
<label>LM</label>
<input type="checkbox" name="campus" value="LM"/>

<div>

    <input  type="submit" value="GENERATE REPORTS"/>

    </div>
    
</form>


    <?php if($_SERVER['REQUEST_METHOD'] == 'POST'):?>

<table>



    <thead>
        <th>ID #</th>
        <th>Name</th>
        <th>Campus</th>
        <th>Amount</th>
        <th>Attended</th>
    </thead>

    <tbody>
        <?php foreach($student as $row):?>
        <tr>
            <td><?php echo $row ['idNum']?> </td>
            <td><?php echo $row ['studFName'] ." ". $row ['studLName']?> </td>
            <td><?php echo $row ['campus']?> </td>
            <td><?php echo $row ['amountPaid']?> </td>
            <td><?php echo $row ['attended']?> </td>
        </tr>
       

        <?php endforeach; ?>

    </tbody>




    
</table>

<div> <span> # of Registrants: <?php echo count($student)?> </span></div>
<div> <span> Total Collection: <?php echo ($total)?></span></div>
<div> <span> # of Attendes: <?php echo ($attendes)?></span></div>
<div> <span> Date Generated: <?php echo date('m/d/Y') ?></span></div>

<?php endif ?>


