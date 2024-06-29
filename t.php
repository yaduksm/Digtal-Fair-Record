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
  <h2><marquee>Welcome</marquee></h2>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
<center>
<form method="post">
<input type='button'value='Register Students' onclick="window.location.href = 'std.html';">
<input type='submit'value='Add Experiments' name = 'labcycle';">
<input type='button'value='Evaluation' onclick="window.location.href = 'search.php';">
<br>
<br>
<input type='submit'value='Students List' name="list1">
<input type='submit'value='View Lab Cycle' name = 'getlabcycle';">
<input type='submit'value='Notifications' name = 'getmessage';">
<input type='button'value='Result Generation' onclick="window.location.href = 'export.php';">
</form>
</center>
</div>
<p>
<?php
 if(array_key_exists('list1', $_POST)) {
            list1();
        }
elseif(array_key_exists('labcycle', $_POST)) {
            labcycle();
        }
elseif(array_key_exists('get1', $_POST)) {
            get1();
        }
elseif(array_key_exists('getlabcycle', $_POST)) {
            getlabcycle();
        }
elseif(array_key_exists('getmessage', $_POST)) {
            getmessage();
        }
elseif(array_key_exists('messages', $_POST)) {
            messages();
        }
function list1(){
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$result = mysqli_query($con,"SELECT firstname,subject from student");

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
<input type='button' value='Close' onclick=window.location.href='t.php';>
</center>
</body> ";
}
function labcycle(){
$date="20".date('y-m-d');
echo " <!DOCTYPE html><html>
<head>
<title>Add Experiment</title>
</head>
<body>
 <form action='' method='post'>
<table align='center' cellpadding = '10'>
 
<!----- Exp No ---------------------------------------------------------->
<tr>
<td><input type='text' placeholder='Exp No' name='expno' required/>
</tr>
 
<!----- aim ---------------------------------------------------------->
<tr>
<td><textarea placeholder='Aim' name='aim'/></textarea>
</tr>
<tr>
<td>
<input type='date' placeholder='Lastdate' name='date' id='datePicker' min=$date></textarea>
</tr>
<tr>
<td> 
<input type='submit' value='Submit' name='get1'>
<input type='button' value='Close' onclick=window.location.href='t.php';>

</td>
</tr>
</table>
 
</form>
 
</body>
</html>
";
}
function get1(){
$expno = $_POST['expno'];
$aim=$_POST['aim'];
$date=$_POST['date'];
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$result = mysqli_query($con,"INSERT INTO `experiment` (`expno`, `aim`,lastdate) VALUES ('$expno', '$aim','$date')");
$sl = mysqli_query($con,"select id from student");
while($row = mysqli_fetch_assoc($sl))
{
$ids=$row["id"];
$up = mysqli_query($con,"INSERT INTO `stat` (`id`, `expno`,status) VALUES ($ids,$expno,0)");
}
echo "Exp no :".$expno."created";
}

function getlabcycle(){
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$result = mysqli_query($con,"SELECT expno,aim,lastdate from experiment");

echo "<html>
<head>
<style>
.labcycle{

}
</style>
<title>id list</title>
<body>
<center>
<div class='getlabcycle'>
<form action='exp.php' method='post'>
<table border='1px' align='bottom'>
  <tr>
    <th>Expno</th>
    <th>Aim</th>
<th>Lastdate</th>
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
echo "</td>
       </tr>


";
}
echo "</table><br></div>";
echo "
<input type='button' value='Close' onclick=window.location.href='t.php';>
</center>
</body> ";
}

function getmessage(){
echo " <html>
<head>
<title>Add Message</title>
</head>
 
<body>
 <form action='msg.php' method='post'>
<table align='center' cellpadding = '10'>
 
<td><input type='text' placeholder='Messages to the students' name='msg' required/>

<input type='submit' value='Submit'>
<input type='button' value='Close' onclick=window.location.href='t.php';>

 
</form>
 
</body>
</html>
";
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
