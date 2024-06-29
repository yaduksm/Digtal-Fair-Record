

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
  <a href="hod.html">Profile</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="logout.php">Log out</a>
</div>

<div id="main">
  <h2><marquee>Welcome</marquee></h2>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
<center>
<input type='button'value='Register Teacher' onclick="window.location.href = 'teach.html';">
<input type='button'value='Approve' onclick="window.location.href = 'rq.php';">
<input type='button'value='Result Generation' onclick="window.location.href = 'export.php';">
<br>
<br>
<form method="post">
<input type='submit'value='Teachers List' name="list1">
</form>
</center>
</div>
<p>
<?php
session_start();
$i=$_SESSION['id'];

 if(array_key_exists('list1', $_POST)) {
            list1();
        }
function list1(){
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$result = mysqli_query($con,"SELECT firstname,subject from teacher");

echo "<html>
<head>
<style>
.list1{

}
</style>
<title>id list</title>
<body>
<center>
<div class='list1'>
<table border='1px' align='bottom'>
  <tr>
    <th>Name</th>
    <th>Subject</th>
  </tr>";
  while($row = mysqli_fetch_assoc($result)) {
  echo "  </tr>
    <td>".$row["firstname"];
echo "</td>
    <td>".$row["subject"];
echo "</td>
       </tr>


";
}
echo "</table><br></div>";
echo "
<input type='button' value='Close' onclick=window.location.href='m.php';>
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
