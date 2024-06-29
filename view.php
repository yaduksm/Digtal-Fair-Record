<html>
<body>

<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'><link rel='stylesheet' href='./style.css'>
<body bgcolor='grey'>
<?php
error_reporting(0);
$id=$_POST['id'];
session_start();
$_SESSION["id"]=$id;
$expno = $_POST['expno'];
$_SESSION["expno"]=$expno;
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$result = mysqli_query($con,"SELECT * from pgm where expno=$expno and id=1002;");
 while($row = mysqli_fetch_assoc($result)) {
$aim=$row["aim"];
$date=$row["date"];
$expno=$row["expno"];
$alg=$row["algorithm"];
$pgm=$row["pgm"];
$_SESSION["pgm"]=$pgm;
$result=$row["result"];
}
echo $date;
echo "<form action='mark.php' method='post'>

Date :$date
      <br>
      Expno:$expno<input type='hidden' value=$expno name='expno'>
<center>Heading</center><br><br>";
echo "
Aim:
<br>
<br>

<textarea style='width: 660px; height: 79px;'>$aim</textarea>

<br>
<br>";
echo "
Algorithm:
<br>
<br>
<textarea  style='width: 660px; height: 297px;' required >$alg</textarea>
<br>
<br>
Program code:
<br>
<br>
<textarea  style='width: 660px; height: 297px;' required >$pgm</textarea>
<br>
<br>
Result:
<br>
<br>
<textarea  style='width: 660px; height: 79px;' required >$result</textarea>
<br>
<br>";
echo "
<center>Output";

$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$query = $con->query("SELECT output FROM pgm where expno=$expno");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'image/'.$row["output"];
?>
    <center><img src="<?php echo $imageURL; ?>" alt="" width="800" height="600"/></center>
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>
<br>
<br>
<input type='text' name='pm' placeholder='program mark'>
<input type='text' name='om' placeholder='Output mark'>
<input type='text' name='vm' placeholder='Viva mark'>
<br>
<br>
<center>
<embed type="text/html" src="pgsm.php" width="300" height="100">
<embed type="text/html" src="reject.html" width="200" height="100">
<embed type="text/html" src="inmsg.html" width="200" height="150">
<input type='submit' value='Submit'>
</form>
</body>
</html>
