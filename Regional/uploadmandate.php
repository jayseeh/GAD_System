<?php
	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("../connect.php");
		
		// get form value
		$depedno = $_POST['depedno'];
		$depedcontent = $_POST['depedcontent'];
		
		

		// query
		$sql = "INSERT INTO mandate (depedno, depedcontent) VALUES ('$depedno', '$depedcontent');";

		// execute query
		if ($conn->query($sql) === TRUE) {
		   	echo "<script>alert('DepEd Mandate successfully saved'); window.location = 'mandates.php';</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}	
		
	}
?>