<?php
	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("../connect.php");
		
		// get form value
		$division = $_POST['division'];
				
		// query
		$sql = "INSERT INTO division (division) VALUES ('$division');";

		// execute query
		if ($conn->query($sql) === TRUE) {
		   	echo "<script>alert('Division successfully saved'); window.location = 'division.php';</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}	
		
	}
?>