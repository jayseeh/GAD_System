<?php
session_start();
include "../connect.php";

$date_submitted = $_POST['date_sub'];
$totalrows=$_POST['numberOfRows'];
$user = $_SESSION['uid'];
$count=1;
//echo $totalrows;
while ( $totalrows > 0) {
	$name = $_POST["personnel_name-".$count];
	$position = $_POST["position-".$count];
	$gender = $_POST["gender-".$count];
	
	mysqli_query($conn,"INSERT INTO attendees(name,position,gender) VALUES ('$name','$position','$gender')");

	$totalrows= $totalrows-1; 	
	$count++;
}
echo "<script>alert('Successfully Added'); window.location = 'personnels.php';</script>";