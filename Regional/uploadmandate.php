<?php
session_start();
include("timezone.php");	
include("../Logs.php");


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("../connect.php");
		
		// get form value
		$depedno = $_POST['depedno'];
		$depedcontent = $_POST['depedcontent'];
		
		

		// query
		$sql = "INSERT INTO mandate (depedno, depedcontent) VALUES ('$depedno', '$depedcontent');";

		$filecount = count($_FILES['file']['name']);
            for($i=0;$i<$filecount;$i++){

	            $fileName = $_FILES['file']['name'][$i];
	            $fileTmpName = $_FILES['file']['tmp_name'][$i];
	            $path = "Memo/".$fileName;

	            $date = date('Y-m-d h:i');

	            $query = "INSERT INTO memo(id,filename, date_temp) VALUES ('$depedno','$fileName', '$date')";
	            $run = mysqli_query($conn,$query);
        	}

		// execute query
		if ($conn->query($sql) === TRUE) {
			insertLogs("Uploaded a memo and mandate with Deped No. ".$depedno);
		   	echo "<script>window.location = 'mandates.php?mandate_uploaded';</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}	
		
	}
?>