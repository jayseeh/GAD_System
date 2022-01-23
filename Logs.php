<?php
function insertLogs($desc){
	require('connect.php');
	$user = $_SESSION['uid'];
	$sql = mysqli_query($conn,"INSERT INTO logs(logs_desc,user_id) VALUES ('$desc','$user')");
}