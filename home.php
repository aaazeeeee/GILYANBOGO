<?php
session_start();
$title = "Home";
include 'db.php';
include 'header.php';
$message =" ";
$fruit = [];
$result = null;
if (isset($_SESSION['user'])) { 
    echo "HELLO!"; 
    echo $_SESSION['id'];
}

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $qty = $_POST['qty'];

    if ($name == "" || $qty == "" ) {
        echo 'Fill all blanks';
    } else {

        if ($qty>= 20){
            $query ="INSERT INTO fruit (name, qty) VALUES ('$name', $qty)";
            $reu = $connection->query($query);
            echo 'Fruit added';
        } else {
            echo 'too small';
        }
       
    }
    }

    $query ="SELECT * from fruit";
    $reu = $connection->query($query);
    if ($reu->num_rows > 0){
        while ($row = $reu->fetch_assoc()) {
            $fruit[] = $row;
        }
    }
$row = null;
if(isset($_GET ['search'])){
    $search = $_GET['search'];
    $query ="SELECT * from fruit WHERE name LIKE '%$search%'";
    $reu = $connection->query($query);
    if($reu->num_rows> 0){
        $result = $reu->fetch_assoc();
    }

}
    

?>

<form method="POST">
    <br>
    <label>Add Fruit</label>
    <br>
    <span>Name</span>
    <input name="name"/>
    <span>Quantity</span>
    <input name="qty">
    <input type="submit" value="Add Fruit">
</form>
 
    <form>
    <input type="" name="search" >
    <input type="submit" value="Search">
    </form>

    <!-- ! = check if naa value ang result,,  if wala e display ang table-->
    <?php if(!isset($_GET['search'])) : 
        echo 'Not found';
        echo count($fruit);
        ?> 
        
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Operation</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($fruit as $row) : ?>   <!--if multiple rows ang imo gikuha sa database e iterate nimo sya aron ma display each
            --><tr>
                <td>  <?php echo $row ['name']?></a> </td>
                <td> <?php  echo $row ['qty']?></td>
                <td><a href="delete.php?id= <?php echo $row['id']?>">Delete</a></td>
                <td><a href="update.php? id=<?php echo $row['id']?>">Update</a></td>
            </tr>

        <?php endforeach;?>
        
    </tbody>
</table>
<?php endif;?>
<?php
if ($_GET ['search'] == 'gilyan'){ 
    echo 'hello';
} else if ($_GET ['search'] == 'allan') {
    echo 'world';
} else {
    echo 'oke';
}



?>

<?php
if($result) {
    echo $result ['name'] ;
    echo $result ['qty'];
}
?>



<a href="logout.php">Logout</a>