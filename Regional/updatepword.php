<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("../connect.php");
		
		// get form value
		$password = $_POST['new_pword'];
		$id= $_POST['id'];
		
		// query
		$sql="UPDATE caps SET password='$password' WHERE id='$id'";


		if(mysqli_query($conn,$sql)){
			echo "<script>window.location = 'regional.php?updated';</script>";
		}else{
			echo "Error updating records!" . mysqli_error($conn);
		}

	}

	
?>