<?php
session_start();
$id=$_SESSION["id"];
$expno=$_SESSION["expno"];
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$result = mysqli_query($con,"UPDATE `stat` SET `status`=3 WHERE id=$id and expno=$expno");
echo <<<EOD
<script>
  alert("Rejected");
</script>
EOD;
?>