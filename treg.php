<?php
$con = mysqli_connect('localhost', 'root', '','digitalrecord');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$subject = $_POST['subject'];
$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($con,"INSERT INTO `teacher` (`firstname`, `lastname`, `email`, `phone`, `subject`) VALUES ('$fname', '$lname', '$email', '$phoneno', '$subject')");
$result1 = mysqli_query($con,"INSERT INTO `log` (`priv`, `username`, `password`) VALUES ('2', '$username', '$password')");
echo ' <meta http-equiv="refresh" content="3; URL=m.php" />';
?>