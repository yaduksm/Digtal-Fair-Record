<?php
$messages=$_POST['msg'];
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$result = mysqli_query($con,"UPDATE `messages` SET `notification`='$messages'");
echo "Message Published....";
echo "<meta http-equiv='refresh' content='3; URL=t.php' />";
?>