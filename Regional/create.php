<?php
	

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
		

		// query
		$sql = "INSERT INTO caps (username, password, lastname, firstname, middlename, userlevel,location, status) VALUES ('$username', '$password', '$lastname', '$firstname', '$middlename', '$userlevel', '$location', '$status');";

		// execute query
		if ($conn->query($sql) === TRUE) {
		   	echo "<script>alert('User information successfully saved'); window.location = 'divisionmanagement.php';</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}	
		
	}
?>