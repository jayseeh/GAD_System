<?php
include("timezone.php");
        $conn = mysqli_connect('localhost','root','','dbcaps');
        if(isset($_POST['submit'])){

        	$filecount = count($_FILES['file']['name']);
        	for($i=0;$i<$filecount;$i++){

        	$division = $_POST['division'];
        	
            $fileName = $_FILES['file']['name'][$i];
            $fileTmpName = $_FILES['file']['tmp_name'][$i];
            $path = "../Regional/Reports/".$fileName;

            $date = date('Y-m-d h:i');
            

            $query = "INSERT INTO report(division, filename, date_submitted) VALUES ('$division','$fileName', '$date')";
            $run = mysqli_query($conn,$query);

            if($run){
                move_uploaded_file($fileTmpName,$path);
                echo "<script>alert('Report Succesfully Uploaded!'); window.location = 'submit.php'; </script>";
            }
            else{
                echo "error".mysqli_error($conn);
            }
           }
        }

        ?>