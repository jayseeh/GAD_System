<?php 
	include('../connect.php');

	$lvlselected = $_POST['lvlselected'];
	$sql="SELECT * FROM division";
    $result=mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){
    	while($row=mysqli_fetch_assoc($result)){ ?>
    		<option> <?php echo $row['division']; ?> </option>
<?php	}
    }

?>