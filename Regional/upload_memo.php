<?php
include("timezone.php");

        $conn = mysqli_connect('localhost','root','','dbcaps');
        if(isset($_POST['submit'])){
            $filecount = count($_FILES['file']['name']);
            for($i=0;$i<$filecount;$i++){

            $fileName = $_FILES['file']['name'][$i];
            $fileTmpName = $_FILES['file']['tmp_name'][$i];
            $path = "Memo/".$fileName;

            $date = date('Y-m-d h:i');

            $query = "INSERT INTO memo(filename, date_temp) VALUES ('$fileName', '$date')";
            $run = mysqli_query($conn,$query);

            if($run){
                move_uploaded_file($fileTmpName,$path);
                echo "<script>window.location = 'mandates.php?memo_uploaded'; </script>";
            }
            else{
                echo "error".mysqli_error($conn);
            }
         }

        }

        ?>