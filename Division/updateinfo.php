<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("../connect.php");
		
		// get form value
		$username = $_POST['username'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$userlevel = $_POST['userlevel'];
		$location = $_POST['location'];
		$id= $_POST['id'];
		
		// query
		$sql="UPDATE caps SET username='$username', lastname='$lastname', firstname='$firstname', middlename='$middlename', userlevel='$userlevel', location='$location' WHERE id='$id'";


		if(mysqli_query($conn,$sql)){
			echo "<script>window.location = '../index.php';</script>";
		}else{
			echo "Error updating records!" . mysqli_error($conn);
		}

	}

	
?>