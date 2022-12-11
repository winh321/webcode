<?php

$severname = "localhost";
$username = "root";
$password = '';
$dbname = "crud";

$conn = mysqli_connect($severname,$username,$password,$dbname);
if(!$conn){
    die("could not connect database");
}else{
    echo "Sever connect successfully";
}
?>