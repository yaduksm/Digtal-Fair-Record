<?php

$con = mysqli_connect('localhost', 'root', '','digitalrecord');

   $ec = $con->query("SELECT id,sum(mark) from pgm group by id");

echo "<!DOCTYPE html>
<html>
<head>
<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'><link rel='stylesheet' href='./style12.css'>
  <title>Status</title>
  <style>
    table {
      border-collapse: collapse;
      width: 25%;
    }
    
    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }
    
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
<form action='process.php' method='post'>
  <h1>Request Table</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Mark
</th>
      <th colspan=2>Requests for Approve</th>
    </tr>
    <tr>";
$c=0;
while($row = mysqli_fetch_assoc($ec)) {
  $id=$row['id'];
  $mark = $row['sum(mark)'];
$nm = $con->query("SELECT firstname,lastname from student where id=$id");
 while($row1 = mysqli_fetch_assoc($nm)) {
  $fname = $row1['firstname'];
$lname=$row1['lastname'];
$name=$fname.$lname;
}
$ids=array();

      echo "<td>".$id."</td>
<input type='hidden' name='ids[]' value=$id>
<input type='hidden' name='count' value=$c>
      <td>".$name."</td>
      <td>".$mark."</td>
  <td><input type='radio' name='status[$c]' value='Approved' required>approve</td><td><input type='radio' name='status[$c]' value='NotApproved'>notapprove</td></tr>";
$c=$c+1;
}
   echo "
  </table>
<br>
<br>
<input type='submit' >
</form>
</body>
</html>";
?>