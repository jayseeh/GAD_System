<?php
session_start();
include "../Logs.php";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("../connect.php");
		
		// get form value
		$password = $_POST['new_pword'];
		$id= $_POST['id'];
		
		// query
		$sql="UPDATE caps SET password='$password' WHERE id='$id'";


		if(mysqli_query($conn,$sql)){
			insertLogs("Changed own password");
			echo "<script>alert('User information successfully updated'); window.location = '../index.php';</script>";
		}else{
			echo "Error updating records!" . mysqli_error($conn);
		}

	}

	
?>