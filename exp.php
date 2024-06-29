<html>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">
<body bgcolor='grey'>
<?php
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$expno=$_POST["expno"];
$result = mysqli_query($con,"SELECT aim from experiment where expno=$expno;");
 while($row = mysqli_fetch_assoc($result)) {
$aim=$row["aim"];
echo $aim;
}
$date=date('20y/m/d');
echo "<form action='Up.php' method='post' enctype='multipart/form-data'>

Date :$date
      <br>
      Expno:$expno<input type='hidden' value=$expno name='expno'>
<center>Heading</center><br><br>";
echo "
Aim:
<br>
<br>

<textarea style='width: 660px; height: 79px;' name='aim'>$aim</textarea>

<br>
<br>";
?> 
Algorithm:
<br>
<br>
<textarea  style="width: 660px; height: 297px;" required name="alg"></textarea>
<br>
<br>
Program code:
<br>
<br>
<textarea  style="width: 660px; height: 297px;" required name="pgm"></textarea>
<br>
<br>
Result:
<br>
<br>
<textarea  style="width: 660px; height: 79px;" required name="res"></textarea>
<br>
<br>
Upload Output Here...
<input type="file" id="img" name="out" accept="image/*" required>
<center>
<input type="submit" name="uploadfile" >
</center>
</form>
</body>
</html>