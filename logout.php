<?php
	session_start();
	unset($_SESSION['ulvl']);
	unset($_SESSION['uid']);
	
	header("Location: index.php"); // Redirecting To Home Page
?>