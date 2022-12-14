<?php
include_once("database_join.php");
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id='$id' ";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);


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

    <p class="title h1 text-center mt-5 text-primary">Edit your post</p>

<section class="container mt-5">
    <div class="row">
        <div class=" col-2"></div>
        <div class="col-8">
        <form  action="update_save.php" method="post" enctype="multipart/form-data" >
                <!-- Email input -->
                <div class="form-outline mb-4">
                <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
                <input type="hidden" name="original" value="<?php echo $row['photo']?>"> 
                  <textarea class="form-control" name="content" cols="20" rows="10"><?php  echo $row['content'];?></textarea>  
                </div>

                <img src=' <?php echo "posts/".$row["photo"]?>' class="img-fluid"/>

              
                <!-- Password input -->
                <div class="form-outline mb-4">
                <input type="file" name="photo" class="form-control"  />
                </div>
              
                <!-- Submit button -->
                <button type="submit" class="btn btn-success btn-block mb-4">Save</button>
            
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

