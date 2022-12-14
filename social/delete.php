<?php
include_once('database_join.php');

$id = $_GET['id'];
$sql = "DELETE FROM posts WHERE id='$id' ";
$answer = mysqli_query($conn,$sql);
header('Location:index.php');

?>