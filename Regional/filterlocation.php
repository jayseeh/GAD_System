<?php
include "../connect.php";
$position  = $_POST['position'];
$count=1;
$html = "<tr>
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 20px;'>Number</th>
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 20px;'>Name</th> 
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 20px;'>Position</th>          
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 20px;'>Gender</th>  
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 20px;'>Division</th>   
          </tr>";
if($position=='All'){
	$query = mysqli_query($conn,"SELECT * FROM attendees");
}else{
	$query = mysqli_query($conn,"SELECT * FROM attendees WHERE division='$position'");
}
while($row = mysqli_fetch_assoc($query)){
	$html = $html . "<tr>
	<td>".$count."</td>
	<td>".$row['name']."</td>
	<td>".$row['position']."</td>
	<td>".$row['gender']."</td>
	<td>".$row['division']."</td>
	</tr>";
	$count++;
}
echo $html."<input type='hidden' value='".($count-1)."' id='total_count' >";
