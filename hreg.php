<?php
$con = mysqli_connect('localhost', 'root', '','digitalrecord');

$name = $_POST['name'];
$department = $_POST['department'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($con,"UPDATE `hod` SET `name`='$name',`department`='$department',`email`='$email',`phone`='$phoneno' WHERE id=100");
$result1 = mysqli_query($con,"update log` set username='$username',password='$password' where id=100");
echo ' <meta http-equiv="refresh" content="3; URL=m.php" />';
?>