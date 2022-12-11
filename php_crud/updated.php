<?php
include_once('database.php');

$id = $_POST['id'];
$title = $_POST['title'];
$writer = $_POST['writer'];
$content = $_POST['content'];
$update = date('Y-m-d H:i:s');
// echo $id;
// echo $title;
// echo $writer;
// echo $content;



$sql = "UPDATE news SET title='$title',writer='$writer', content='$content',updated_at='$update' WHERE id='$id' ";
$answer = mysqli_query($conn,$sql);


header('Location:news.php');

?>