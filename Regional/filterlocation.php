<?php
include "../connect.php";
$position  = $_POST['position'];
$count=1;
$html = "<tr>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Number</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Name</th> 
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Position</th>          
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Gender</th>  
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Division</th>   
          </tr>";
$query = mysqli_query($conn,"SELECT * FROM attendees WHERE division='$position'");
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
