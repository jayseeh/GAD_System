<?php
	session_start();
	require("Logs.php");
	insertLogs("Logged out");
	unset($_SESSION['ulvl']);
	unset($_SESSION['uid']);
	
	header("Location: index.php"); // Redirecting To Home Page
?>