<?php
session_start();
$id=$_SESSION["id"];
$inmsg=$_POST['inmsg'];
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$result = mysqli_query($con,"UPDATE `inmsg` SET message=$inmsg WHERE id=$id");
echo "Message Published....";
echo "<meta http-equiv='refresh' content='3; URL=t.php' />";
?>