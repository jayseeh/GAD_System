<?php
include "../connect.php";

$code = $_POST['thecode'];
$start = $_POST['start_date'];
$end = $_POST['end_date'];

$query = mysqli_query($conn,"UPDATE fiscal_year SET start_date='$start', end_date='$end' WHERE code='$code'");
if($query){
	echo "<script>window.location ='fiscalyear.php?update_fiscal';</script>";
}