<?php

include_once("database.php");

$title = $_POST['title'];
$writer = $_POST['writer'];
$content = $_POST['content'];

$sql =  "INSERT INTO news (title,writer,content) VALUES ('$title','$writer','$content')";
mysqli_query($conn,$sql);

header('Location:news.php');


?>