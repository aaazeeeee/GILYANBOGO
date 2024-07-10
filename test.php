<?php


session_start();

echo "allan " . "boang ";

$asd = "1";


if($asd === 1)
echo 'true';



$username = "";

if (!empty($username)) {
    echo "Username is not empty. <br>";
} else {
    echo "Username is empty.";
}





if (isset($_SESSION ['name'])){
    if (strtolower($_SESSION ['name']) == "gilyan"){
    echo  '<h1> HEllo world </h1>';
    } else 
    echo 'wala';
} else 
echo 'not logged in';










?>