<?php
$expno=$_POST['expno'];
$pm=$_POST['pm'];
$om=$_POST['om'];
$vm=$_POST['vm'];
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$result = mysqli_query($con,"update pgm set mark=$pm+$om+$vm;");
echo $expno;
echo ' <meta http-equiv="refresh" content="3; URL=t.php" />';
?>