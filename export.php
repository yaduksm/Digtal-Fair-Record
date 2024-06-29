<?php
$con = mysqli_connect('localhost', 'root', '','digitalrecord');

   $ec = $con->query("SELECT count(expno) from experiment");
 while($row = mysqli_fetch_assoc($ec)) {
  $expcount = $row['count(expno)'];
}
 //export table data to excel

  $output = "";
         
        $output .= '<table class="table table-bordered" border="1">  
<tr><center><th colspan=17>Dept of CSE</th></tr>
<tr><th colspan=17>C Programming</th></center></tr>
<tr><th colspan=4>No of Experiments</th></center><td>'.$expcount.'</td></tr>


                    <tr>  
			<th scope="col">SlNo</th
                          <th scope="col">id</th>
			  <th scope="col">Name</th>
                          <th scope="col">Mark</th>
			  <th scope="col">Eligibility</th>
                         
                    </tr>';
             
   $sql = "SELECT id,sum(mark) from pgm group by id";
   $stmt = $con->prepare($sql);
   $stmt->execute();
 $resultSet = $stmt->get_result();
$data = $resultSet->fetch_all(MYSQLI_ASSOC);
        
foreach($data as $key=>$value){
$id=$value['id'];
 $nm = $con->query("SELECT firstname,lastname,eligibility from student where id=$id");
 while($row = mysqli_fetch_assoc($nm)) {
  $fname = $row['firstname'];
$lname=$row['lastname'];
$elg=$row['eligibility'];
$name=$fname.$lname;
}
 
    $output .= '<tr>  
                         <td>'.($key+1).'</td>   
                         <td>'.$value['id'].'</td> 
                         <td>'.$name.'</td> 
                         <td>'.$value['sum(mark)'].'</td>  
                         <td>'.$elg.'</td> 
                          
                    </tr>';  
        }
          
        $output .= '</table>';
        
        $filename = "Lab Result".date('Ymd') . ".xls";         
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");  
        echo $output;
         
?>