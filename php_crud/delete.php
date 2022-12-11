<?php
include_once('database.php');

$id = $_GET['id'];
echo $id;

$sql = "DELETE FROM news WHERE id='$id' ";
$answer = mysqli_query($conn,$sql);


header('Location:news.php');

?>