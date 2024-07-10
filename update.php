<?php
include 'db.php';


if(!isset($_GET['id'])){
   header('location: ./home.php'); 
}


$id = $_GET['id'];
echo $id;


$fruit;

$message="";

if($_SERVER['REQUEST_METHOD'] == 'POST') {


    $name = $_POST['name'];
    $qty = $_POST['qty'];

    $asd = "UPDATE fruit SET name =  '$name', qty  =  '$qty' WHERE id=$id";
    $result = $connection->query($asd);


    $message  = "Updated Successfully";
}
$query = "SELECT * FROM fruit WHERE id = $id";
$reu = $connection->query($query);
if ($reu->num_rows> 0){
    $fruit = $reu->fetch_assoc();
}


?>


<form method="POST">
    <?php echo $message;?>
    <label>Name</label>
    <input name="name" value="<?php  echo $fruit['name']?>"/> 
    
    <label>Quantity</label>
    <input name="qty" value="<?php  echo $fruit['qty']?>"/>
    <input type="submit" value="Update"/>

</form>