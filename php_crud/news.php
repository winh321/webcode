<?php
include_once "database.php";
$sql = "SELECT * FROM news ";
$result = mysqli_query($conn,$sql);
// print_r($result);

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
    <table border="1">
        <tr>
           <th>Title</th>
           <th>Writer</th>
           <th>Content</th>
           <th>Created at</th>
           <th>Updated at</th>
           <th>Update</th>
           <th>Delete</th>

        </tr>
        <?php
        $i = 0;
        while($row=mysqli_fetch_array($result)){
            ?>
        <tr>
            <td><?php echo $row["title"]?> </td>
            <td><?php echo $row["writer"]?> </td>
            <td><?php echo $row["content"]?> </td>
            <td><?php echo $row["created_at"]?> </td>
            <td><?php echo $row["updated_at"]?> </td>
            <td> <a href="edit.php?id=<?php echo $row['id'] ?>" >Edit </td>
            <td> <a href="delete.php?id=<?php echo $row['id'] ?>" >Delete </td>
        </tr>

            <?php
        }
            ?>
        </tr>
    </table>
    <br>
    <br>
    <a href="form.html" > <button> Add Data</button> </a>
</body>
</html>