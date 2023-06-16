<?php

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = $_GET['id'];
echo $txt;
fwrite($myfile, $txt);
fclose($myfile);

?>

