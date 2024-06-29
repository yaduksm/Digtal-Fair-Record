<!DOCTYPE html>
<html>
<head>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style12.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
 
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #111;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Profile</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="logout.php">Log out</a>
</div>

<div id="main">
  <h2><marquee>
<?php 
session_start();
$id=$_SESSION["id"];
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$im = mysqli_query($con,"SELECT message from inmsg where id=$id");
while($row1 = mysqli_fetch_assoc($im)) {
$inmsg=$row1['message'];
}
$result = mysqli_query($con,"SELECT notification from messages");
 while($row = mysqli_fetch_assoc($result)) {
$msg=$row['notification'];
}
echo "Welcome....<font style='color:red'>".$msg;
echo "</marquee>Notifications:<font style='color:red'>".$inmsg; echo "</font></h2>"; ?>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
<center>
<form method="post">
<input type='submit'value='LAB Cycle' name="labcycle">
<input type='button'value='Experments' onclick="window.location.href = 'exp.html';">
<input type='button'value='Status'>
<br>
<br>
<input type='submit'value='Students List' name="list1">
</form>
</center>
</div>
<p>
<?php
 if(array_key_exists('list1', $_POST)) {
         
        }
elseif(array_key_exists('labcycle', $_POST)) {
            labcycle();
        }
function labcycle(){
session_start();
$i=$_SESSION['id'];
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$result = mysqli_query($con,"SELECT expno,aim,lastdate from experiment");
$check = mysqli_query($con,"SELECT status from stat where id=$i");
echo "<html>
<head>
<style>
.labcycle{

}
</style>
<title>id list</title>
<body>
<center>
<div class='labcycle'>
<form action='exp.php' method='post'>
<table border='1px' align='bottom'>
  <tr>
    <th>Expno</th>
    <th>Aim</th>
<th>Lastdate</th>
<th>status</th>
<th></th>
  </tr>";
$expno=0;
  while($row = mysqli_fetch_assoc($result)) {
$expno=$expno+1;
  echo "  </tr>
    <td>".$row["expno"];
echo "</td>
    <td>".$row["aim"];

echo "</td>
<td>".$row['lastdate'];
while($row = mysqli_fetch_assoc($check))
{
$sub=$row["status"];
if($sub==1)
{
echo "</td>
<td>submitted";
break;
}
else if($sub==0)
{
echo "</td>
<td>not submitted";
break;
}
else
{
echo "</td>
<td>Rejected";
break;
}
}
echo "</td>
<td><input type='Submit' name='expno' value='$expno' ></td>
       </tr>


";
}
echo "</table><br></div>";
echo "
<input type='button' value='Close' onclick=window.location.href='s.php';>
</center>
</body> ";
}
?>
</p>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>
</html> 
