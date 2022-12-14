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

    <p class="title h1 text-center mt-5">Login Your Account</p>
<section class="container mt-5">
    <div class="row">
        <div class=" col-2"></div>
        <div class="col-8">

            <form  action="?" method="post">
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input name="email" type="email" id="form2Example1" class="form-control" />
                  <label class="form-label" for="form2Example1">Email address</label>
                </div>
              
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input name="password" type="password" id="form2Example2" class="form-control" />
                  <label  class="form-label" for="form2Example2">Password</label>
                </div>
              
              
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">login</button>
              
                <!-- Register buttons -->
                <div class="text-center">
                  <p>Dont't have a account ? <a href="#!">Register</a></p>
        
                </div>
              </form>

              <?php

              if(isset($_POST['email'])){
             

                session_start();
                include_once('database_join.php');
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $sqlmail = "SELECT * FROM users where email='$email'";
                $check = mysqli_query($conn,$sqlmail);
                
                if (mysqli_num_rows($check) > 0){
                
                    $sqlmail = "SELECT * FROM users where email='$email' and password='$password'";
                $check = mysqli_query($conn,$sqlmail);
                if (mysqli_num_rows($check) > 0){
                
                    echo "Login Success";
                    $row = mysqli_fetch_array($check);
                    var_dump($row);
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['photo'] = $row['photo'];

                    
                    header('Location:index.php');
                }else{
                
                    echo "<h3 style='color:red'><center> Your password is incorrect! </center> </h3>";
                }
                
                }else{
                
                    echo "<h3 style='color:red'><center> Your account don't exist! </center> </h3>";
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