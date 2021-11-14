<?php
	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("../connect.php");
		
		// get form value
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$code = $_POST['code'];
		$FYstatus = $_POST['FYstatus'];
		
		

		// query
		$sql = "INSERT INTO fiscal_year (start_date, end_date, code, status) VALUES ('$start_date', '$end_date', '$code', '$FYstatus');";

		// execute query
		if ($conn->query($sql) === TRUE) {
		   	echo "<script>window.location = 'fiscalyear.php?FY_setup';</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}	
		
	}
?>