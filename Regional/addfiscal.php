<?php
	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("../connect.php");
		
		// get form value
		date_default_timezone_set("Asia/Singapore");
		$date = date('Y');
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$str = explode("-", $start_date);
    	$code=$str[0];
    	if($date==$code){
			$FYstatus = 'ACTIVE';
    	}else{
    		$FYstatus = 'INACTIVE';
    	}
		
		

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