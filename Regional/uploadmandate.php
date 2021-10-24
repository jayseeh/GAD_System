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
		   	echo "<script>window.location = 'mandates.php?mandate_uploaded';</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}	
		
	}
?>