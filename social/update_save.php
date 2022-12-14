<?php


session_start();

  include_once("database_join.php");
  
  $content = $_POST['content'];
  $id = $_POST['id'];
  $photo = $_POST['original'];
  $update = date('Y-m-d H:i:s');
  $file = $_FILES['photo']['name'];
  // check phot reupload or not
  if($file == ""){

    $final_file = $photo;

  }else{

    $file_loc = $_FILES['photo']['tmp_name'];
    $folder = "posts/";
    $new_file_name = strtolower($file);
    $randfile = rand(1000,100000).'_'.$new_file_name;
    $final_file = str_replace('','-',$randfile);
    move_uploaded_file($file_loc,$folder.$final_file);
  }
 
  
 
  

  $sql = "UPDATE posts SET content='$content', photo='$final_file',updated_at='$update' WHERE id='$id' ";
  mysqli_query($conn,$sql);

  header('Location:index.php');
  
  
  


?>