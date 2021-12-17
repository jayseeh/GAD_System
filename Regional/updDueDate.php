<?php
session_start(); 
include "../connect.php";
date_default_timezone_set("Asia/Singapore");

$type= $_GET['type'];
$id = $_POST['id'];
$due_date = $_POST['due_date'];

$query = mysqli_query($conn,"UPDATE due_dates SET due_date='$due_date' WHERE id='$id'");

if($query){
	if($type=='GPB'){
		echo "<script>window.location ='gpbdue.php?gpb_update_due';</script>";
	}else{
		echo "<script>window.location ='gadardue.php?gadar_update_due';</script>";
	}
}