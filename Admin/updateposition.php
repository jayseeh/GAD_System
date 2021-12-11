<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("../connect.php");
		
		// get form value
		$position = $_POST['position'];
		$id= $_POST['id'];		
		// query
		$sql="UPDATE position SET position='$position' WHERE id='$id'";

		if(mysqli_query($conn,$sql)){
			echo "<script>alert('Position successfully updated'); window.location = 'position.php';</script>";
		}else{
			echo "Error updating records!" . mysqli_error($conn);
		}

	}

	
?>