<?php
$con = mysqli_connect('localhost', 'root', '','digitalrecord');

    // Retrieve the submitted data
    $id = $_POST['ids'];
    $stat=$_POST['status'];
    $c=$_POST['count'];
$i=0;
while($c>=$i)
{
$result = mysqli_query($con,"update student set eligibility='$stat[$i]'where id=$id[$i];");
 $i=$i+1;
}
echo ' <meta http-equiv="refresh" content="1; URL=m.php" />';
?>
