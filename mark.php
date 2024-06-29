<?php
session_start();
$id=$_SESSION["id"];
$expno=$_POST['expno'];
$pm=$_POST['pm'];
$om=$_POST['om'];
$vm=$_POST['vm'];
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$result = mysqli_query($con,"update pgm set mark=$pm+$om+$vm where id=$id and expno=$expno;");
echo ' <meta http-equiv="refresh" content="1; URL=t.php" />';
?>