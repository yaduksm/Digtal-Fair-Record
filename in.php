<?php
$con = mysqli_connect('localhost', 'root', '','digitalrecord');

$password = $_POST['password'];
$security_code= $_POST['security_code'];

if($security_code=='1234')
{
$sql = "update 'log' set password='$password' where username='admin'";
$sql1 = "update new set flag=1";
$rs = mysqli_query($con, $sql);
$rs1 = mysqli_query($con, $sql1);
echo 'successfully uploaded';
echo ' <meta http-equiv="refresh" content="3; URL=hodn.php" />';
}
else
{
echo 'Updation failed';
}
?>