<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `pgm` WHERE CONCAT(`id`, `date`, `expno`,`aim`,`algorithm`, `pgm`,`output`,`result`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `pgm` order by id";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "digitalrecord");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>

    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style12.css">
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Id</th>
 <th>Name</th>
 <th>ExpNo</th>
<th>Aim</th>
                    <th>Submitted Date</th>

<th>Marks</th>
                </tr>
</form>
<form action="view.php" method="post">
      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id'];$id=$row['id'];?></td>
		    <td><?php 
$connect = mysqli_connect("localhost", "root", "", "digitalrecord");
$nm=mysqli_query($connect,"SELECT firstname FROM student WHERE id=id");
		while($row1 = mysqli_fetch_array($nm))
{
			echo $row1['firstname'];}?></td>
		    <td><?php echo $row['expno']; $expno=$row['expno'];?></td>
		    <td><?php echo $row['aim'];?></td>
                    <td><?php echo $row['date'];?></td>
                   
		    <td><?php echo $row['mark'];?></td>
<?php error_reporting(0); echo "<input type='hidden' value=$valueToSearch name='id'>";?>
                   <td><?php echo"<input type='submit' name='expno' value=$expno>";?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>