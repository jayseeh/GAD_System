<?php
session_start();
require("../Logs.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("../connect.php");
		
		// get form value
		$username = $_POST['username'];
		$password = $_POST['password'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$userlevel = $_POST['userlevel'];
		$location = $_POST['location'];
		$status = $_POST['status'];
		$id= $_POST['id'];
		//asan na ung code? ahaha
		// query
		$sql="UPDATE caps SET username='$username', password='$password', lastname='$lastname', firstname='$firstname', middlename='$middlename', userlevel='$userlevel', location='$location', status='$status' WHERE id='$id'";

		if(mysqli_query($conn,$sql)){
			echo "<script>alert('User information successfully updated'); window.location = 'user.php';</script>";
			insertLogs("Updated user information of ".$username);
		}else{
			echo "Error updating records!" . mysqli_error($conn);
		}

	}

	
?>