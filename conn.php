<?php
$con = mysqli_connect('localhost', 'root', '','digitalrecord');

$username = $_POST['username'];
$password = $_POST['password'];
$usertype = $_POST['priv'];
session_start();
$result = mysqli_query($con,"SELECT id FROM log WHERE username='$username' and password='$password' and priv='$usertype'");
$res = mysqli_fetch_row($result);
$idget = mysqli_query($con,"SELECT id FROM log WHERE username='$username' and password='$password' and priv='$usertype'");
$result1=mysqli_query($con,"SELECT flag from new");

while($row = mysqli_fetch_assoc($idget)) {
  $id = $row['id'];
}
$_SESSION['id'] = $id;
while($row = mysqli_fetch_assoc($result1))
{
$flag=$row["flag"];
}
if($res>0)
   {
if($usertype==1)
{
if($flag==0){
echo ' <meta http-equiv="refresh" content="3; URL=pass.html" />';
}
else
{
echo ' <meta http-equiv="refresh" content="3; URL=m.php" />';
}
}
if($usertype==2)
{
$sub = mysqli_query($con,"SELECT subject FROM teacher WHERE id=$id");
while($row = mysqli_fetch_assoc($sub)) {
  $subject = $row['subject'];
}
$_SESSION['subject'] = $subject;
echo ' <meta http-equiv="refresh" content="3; URL=t.php" />';
}
if($usertype==3)
{
$sub = mysqli_query($con,"SELECT subject FROM student WHERE id=$id");
while($row = mysqli_fetch_assoc($sub)) {
  $subject = $row['subject'];
}
$_SESSION['subject'] = $subject;
echo ' <meta http-equiv="refresh" content="3; URL=s.php" />';
}
   }
else
   {
    echo 'Login not successfull';
    echo ' <meta http-equiv="refresh" content="3; URL=log.html" />';
   }
?>