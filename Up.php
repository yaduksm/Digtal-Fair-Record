<?php
session_start();
$i=$_SESSION['id'];

//error_reporting(0);

$date=date('20y/m/d');
// check if the user has clicked the button "UPLOAD" 
if (isset($_POST['uploadfile'])) {
$expno=$_POST["expno"]; 
$aim=$_POST["aim"];
$alg=$_POST["alg"];    
$pgm=$_POST["pgm"];
$res=$_POST["res"];
    $filename = $_FILES["out"]["name"];

    $tempname = $_FILES["out"]["tmp_name"];  

        $folder = "image/".$filename;

      // connect with the database

    $db = mysqli_connect("localhost", "root", "", "digitalrecord");

        // query to insert the submitted data

        $sql = "INSERT INTO pgm (id,date,expno,aim,algorithm,pgm,output,result) VALUES ($i,'$date',$expno,'$aim','$alg','$pgm','$filename','$res')";

$sql2 = "UPDATE `stat` SET `status`=1 WHERE expno=$expno and id=1" ;

     // function to execute above query

        mysqli_query($db, $sql);
	mysqli_query($db, $sql2);       

        // Add the image to the "image" folder"

        if (move_uploaded_file($tempname, $folder)) {

            echo "Image uploaded successfully";

        }else{

            echo "Failed to upload image";

    }
echo ' <meta http-equiv="refresh" content="3; URL=s.php" />';

}
?> 