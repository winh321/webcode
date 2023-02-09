<?php


//database join php

$severname = "localhost";
$username = "id20274017_twodexcel";
$password = "Twod?excel123";
$dbname = "id20274017_userlist";

$conn = mysqli_connect($severname,$username,$password,$dbname);
if(!$conn){
    die("could not connect database");
}else{
   //  echo "Sever connect successfully <br>";
}

// postid get method to delete
if(isset($_GET['postid'])){
    
    $postid = $_GET['postid'];
    $sql = "DELETE FROM userdata WHERE postid='$postid'";
    mysqli_query($conn,$sql);
    
}elseif(isset($_POST['d'])){
    
// get common data for any variable both post and edit method 
// post method without postid 
// edit method with postid

    
    $n = $_POST['n'];
    $t =  $_POST['t'];
    $d = $_POST['d'];
    $v =  $_POST['v'];
    $r =  $_POST['r'];
    $ph =  $_POST['ph'];
    
    if (isset($_POST['postid'])){
        
        //here edit method
        $postid = $_POST['postid'];
    $sql = "UPDATE userdata SET n='$n', t='$t', d='$d',v='$v',r='$r',ph='$ph'
    WHERE postid='$postid' ";
  mysqli_query($conn,$sql);
        
    }else{
        
    //here post method without postid in request
        
$sql = "INSERT INTO userdata (n,t,d,v,r,ph) VALUES ('$n','$t','$d','$v','$r','$ph')";
    mysqli_query($conn,$sql);
    }

   
}

//show data from database as json format

$sql = "SELECT * FROM userdata";
$result = $conn->query($sql);

 //create an array
    $json = [];
    while($row =mysqli_fetch_assoc($result))
    {
        $json[] = $row;
    }
    echo json_encode($json);


$conn->close();

?>
