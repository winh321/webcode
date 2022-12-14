<?php

session_start();
include_once("database_join.php");
$sql = "SELECT * FROM posts ORDER BY id DESC ";
$result = mysqli_query($conn,$sql);

function getDateTimeDiff($date) {
  $now_timestamp = strtotime(date('Y-m-d H:i:s'));
  $diff_timestamp = $now_timestamp - strtotime($date);

  if ($diff_timestamp < 60) {
      return 'just now';
  } else if ($diff_timestamp >= 60 && $diff_timestamp < 3600) {
      return round($diff_timestamp/60).' mins ago';
  } else if ($diff_timestamp >= 3600 && $diff_timestamp < 86400) {
      return round($diff_timestamp/3600).' hours ago';
  } else if ($diff_timestamp >= 86400 && $diff_timestamp < (86400*30)) {
      return round($diff_timestamp/(86400)).' days ago';
  } else if ($diff_timestamp >= (86400*30) && $diff_timestamp < (86400*365)) {
      return round($diff_timestamp/(86400*30)).' months ago';
  } else {
      return round($diff_timestamp/(86400*365)).' years ago';
  }
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

    <style>
      h4{
        margin-right:20px
      }
    </style>
</head>
<body>

  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container">
      <!-- Navbar brand -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white bg-primary  border rounded" href="#"> My Vlog </a>
          </li>
</ul>
  
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarButtonsExample"
        aria-controls="navbarButtonsExample"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarButtonsExample">
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-home  text-primary"></i>Home</a>
          </li>

          <?php
        
        if(isset($_SESSION['email'])){
          echo '<li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-user-friends"></i>Friends List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-bell"></i>Notifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fab fa-facebook-messenger"></i>Chat</a>
        </li>
        ';
        }else{
          
        }

        ?>

        </ul>
        <!-- Left links -->

        <?php
      //  user data get from logined email
      if(isset($_SESSION['email']) ){
        $emailowner = $_SESSION['email'];
$ownersql = "SELECT * FROM users WHERE email='$emailowner' ";
$owneranswer = mysqli_query($conn,$ownersql);
$ownerdata=mysqli_fetch_array($owneranswer);
$photo = "photos/".$ownerdata['photo'];
$name = $ownerdata['name'];
$_SESSION['photo'] = $ownerdata['photo'];
$_SESSION['name'] = $ownerdata['name'];

}

       
        //show login button user is not signed
        if(!(isset($_SESSION['email']))){
          echo '<div class="d-flex align-items-center">
          <a  href="login.php" class="btn btn-link px-3 me-2">
            Login
          </a>
          <a  href="signup.php" class="btn btn-primary me-3">
            Sign up for free
          </a>
          
        </div>';
        }else{
          echo " <h4>$name</h4> <a class='nav-link' href='account_info.php'> <img width='40px' height='40px' src='$photo' class='rounded-circle' /> </a> <a  href='logout.php' class=' text-primary m-2'>
          Logout
        </a>";
        }

        ?>
  
        
      </div>
      <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->

  <section>

  <div class="container">
    <div style="height:400px" class="row ">
      <div class="col-md-3 col-12"> 

</div>
     

      <div class="col-md-6 col-12">

      <?php
        $i = 0;
        while($row=mysqli_fetch_array($result)){
            ?>

      <div class="card">
  <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
   
    <a href="#!">
      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
    </a>
  </div>
  <div class="card-body">
    <div>
      <hr>
     <img width='40px' height='40px' src=' <?php 
    
      $emailowner = $row['email'];
$testsql = "SELECT * FROM users WHERE email='$emailowner' ";
$testanswer = mysqli_query($conn,$testsql);
$testdata=mysqli_fetch_array($testanswer);
$photo = "photos/".$testdata['photo'];


      echo $photo ;
      ?>' class='rounded-circle' /><b> <a  href='#' class='b-3 titile text-dark m-2'>
     <?php 
  $emailowner = $row['email'];
  $testsql = "SELECT * FROM users WHERE email='$emailowner' ";
  $testanswer = mysqli_query($conn,$testsql);
  $testdata=mysqli_fetch_array($testanswer);
  $photo = $testdata["name"];
 echo $photo;

    ?>
     <!-- Post Owner yes or no  -->
        </a></b> <?php 
        if(isset($_SESSION['email']) && $_SESSION['email'] == $row["email"] ){
        
        ?>
        
        <a  href="delete.php?id=<?php echo $row['id'] ?>" class='b-3 titile text-dark m-2'>
        <i class="fa-sharp fa-solid fa-trash text-danger"></i></a> 
      
        <a href="edit.php?id=<?php echo $row['id'] ?>" class='b-3 titile text-dark  m-2'>
        <i class="fa-solid text-success fa-pen-to-square"></i> </a> 
<?php } ?>

    </div>
    <div class="mt-3">
    <i class="fa-sharp fa-solid fa-calendar-days text-primary"> <?php echo(getDateTimeDiff($row['created_at'])) ?> </i> 
    </div>
    <p class="card-text">  <?php echo $row["content"]?> <a href="#!" class="text-primary">...see more</a></p>
    
    <img src=' <?php echo "posts/".$row["photo"]?>' class="img-fluid"/>
    
  </div>
</div>

<?php
        }
            ?>

      </div>

      <div class="col-md-3 col-12"> 

</div>

    </div>
  </div>


  </section>




    <!-- MDB -->
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
</body>
</html>