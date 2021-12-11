<?php
	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("../connect.php");
		
		// get form value
		$position = $_POST['position'];
				
		// query
		$sql = "INSERT INTO position (position) VALUES ('$position');";

		// execute query
		if ($conn->query($sql) === TRUE) {
		   	echo "<script>alert('Position successfully saved'); window.location = 'position.php';</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}	
		
	}
?>