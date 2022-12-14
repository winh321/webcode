

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

    <p class="title h1 text-center mt-5">Signup Your Account</p>
<section class="container mt-5">
    <div class="row">
        <div class=" col-2"></div>
        <div class="col-8">

            <form action="?" method="post" enctype="multipart/form-data" >


                <!-- name input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form0Example1"  name="name" class="form-control" />
                    <label class="form-label" for="form0Example1">Your Name</label>
                  </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email"  name="email" id="form2Example1" class="form-control" />
                  <label class="form-label" for="form2Example1">Email address</label>
                </div>
              
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form2Example2" name="password" class="form-control" />
                  <label class="form-label" for="form2Example2">Password</label>
                </div>

                  <!-- File input -->
                  <div class="form-outline mb-4">
                    <input type="file" name="photo" class="form-control" id="customFile" />
                  </div>
              
            
              
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
              
                <!-- Login buttons -->
                <div class="text-center">
                  <p>Do you have a account ? <a href="login.php">login now</a></p>
        
                </div>
              </form>

                 <!-- Post method php-->

              <?php
include_once("database_join.php");

if(isset($_POST['name'])){

  $name = $_POST['name'];
$email = $_POST['email'];
$password = md5( $_POST['password']);

$sqlmail = "SELECT * FROM users where email='$email'";
$check = mysqli_query($conn,$sqlmail);

if (mysqli_num_rows($check) > 0){
    echo "<h3 style='color:red'><center> email already exists! </center> </h3>";
}else{


$file = $_FILES['photo']['name'];
$file_loc = $_FILES['photo']['tmp_name'];
$folder = "photos/";
$new_file_name = strtolower($file);
$randfile = rand(1000,100000).'_'.$new_file_name;
$final_file = str_replace('','-',$randfile);
echo("$final_file");
move_uploaded_file($file_loc,$folder.$final_file);

$sql = "INSERT INTO users(name,email,password,photo) VALUES ('$name','$email','$password','$final_file')";
mysqli_query($conn,$sql);

header('Location:login.php');

}

}

?>

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