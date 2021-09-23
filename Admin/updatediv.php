<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("../connect.php");
		
		// get form value
		$division = $_POST['division'];
		$id= $_POST['id'];		
		// query
		$sql="UPDATE division SET division='$division' WHERE id='$id'";

		if(mysqli_query($conn,$sql)){
			echo "<script>alert('Division successfully updated'); window.location = 'admin.php';</script>";
		}else{
			echo "Error updating records!" . mysqli_error($conn);
		}

	}//balik ka nga aha

	
?>