<?php 
	include('../connect.php');

	$location1 = $_POST['location'];
	$locattend= mysqli_query($conn,"SELECT DISTINCT location FROM caps WHERE status='ACTIVE'");

	$sql="SELECT DISTINCT division FROM division";
    $result=mysqli_query($conn, $sql);
    $location = array();
    $division = array();
    while($x=mysqli_fetch_assoc($locattend)){
    	array_push($location, $x['location']);
	}
	while($row=mysqli_fetch_assoc($result)){ 
		array_push($division, $row['division']);
	}
	$new_array = array_diff($division, $location);
	array_push($new_array, $location1);
    foreach ($new_array as $key) {
	  //echo "<option>".$key."</option>";
	  if ( $key == $location1){
	  	echo "<option value='".$key."' selected >".$key."</option>";
	  }else{ 
	  	echo "<option value='".$key."'>".$key."</option>";
	  } 
	}
?>