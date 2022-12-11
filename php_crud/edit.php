<?php
include_once("database.php");
echo "this is edit page";
$id = $_GET['id'];
echo "$id";

$sql = "SELECT * FROM news WHERE id='$id' ";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="updated.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
    Title: <br>
    <input type="text" name="title" value="<?php echo $row['title']?> "> <br>
    Writer: <br>
    <input type="text" name="writer" value="<?php echo $row['writer']?> "> <br>
    Content: <br>
    <textarea name="content" id="" cols="20" rows="20" >
    <?php echo $row['content']?>
    </textarea> <br>
    
    <input type="submit" value="Updated Data">

   </form>
</body>
</html>