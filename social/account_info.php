
<?php
session_start();
if(isset($_POST['content'])){
  include_once("database_join.php");
  
  $content = $_POST['content'];
  $email = $_SESSION['email'];
  $profile = $_SESSION['photo'];
  $name = $_SESSION['name'];
  $file = $_FILES['photo']['name'];
  $file_loc = $_FILES['photo']['tmp_name'];
  $folder = "posts/";
  $new_file_name = strtolower($file);
  $randfile = rand(1000,100000).'_'.$new_file_name;
  $final_file = str_replace('','-',$randfile);
  $created_at = date('Y-m-d H:i:s');
  
  move_uploaded_file($file_loc,$folder.$final_file);
  
  $sql = "INSERT INTO posts (name,content,email,profile,photo,created_at) VALUES ('$name','$content','$email','$profile','$final_file','$created_at')";
  mysqli_query($conn,$sql);
  header('Location:index.php');
  
  
  }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
  rel="stylesheet"
/>
    <title>Document</title>
</head>
<body>

    <p class="title h1 text-center mt-5 text-primary">Your Profile</p>
<section class="container mt-5">
    <div class="row">
        <div class=" col-2"></div>
        <div class="col-8">
           <center><div>

           <img class="rounded-circle" width="200px" height="200px" src="<?php echo "photos/".$_SESSION['photo'] ?>" alt="profile"><br>
           <p class="title h4 mt-3"><?php echo $_SESSION['name'] ?></p>
           <p class="text-primary"><?php 
           
           $email = $_SESSION['email'];
           echo "@".(substr($email,0,stripos($email,'@')));
            ?>  </p>

           </div> </center>
        </div>
        <div class="sm-4 col-2"></div>
      </div>
</section>
<section class="container mt-5">
    <div class="row">
        <div class=" col-2"></div>
        <div class="col-8">
          <p>Write your status:</p>
        <form  action="?" method="post" enctype="multipart/form-data" >
                <!-- Email input -->
                <div class="form-outline mb-4">
                   
                  <textarea class="form-control" name="content" cols="20" rows="4"></textarea>  
                </div>
              
                <!-- Password input -->
                <div class="form-outline mb-4">
                <input type="file" name="photo" class="form-control"  />
                </div>
              
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Upload Status</button>
            
                </div>
              </form>  

        </div>
        <div class="sm-4 col-2"></div>
      </div>
</section>



    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
</body>
</html>

