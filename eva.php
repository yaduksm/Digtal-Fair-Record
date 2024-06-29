<?php
$con = mysqli_connect('localhost', 'root', '','digitalrecord');
$query = $con->query("SELECT output FROM pgm");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'image/'.$row["output"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>