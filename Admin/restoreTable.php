<?php
$conn = mysqli_connect("localhost", "root", "", "dbcaps");
$filePath = "C:/xampp/htdocs/GAD_System/Admin/Database/dbcaps.sql";
$fileTmpName = $_FILES['dbtable']['tmp_name'];

//echo $fileTmpName ;
function restoreMysqlDB($filePath, $conn)
{
    $sql = '';
    $error = '';
    
    if (file_exists($filePath)) {
        $lines = file($filePath);
        
        foreach ($lines as $line) {
            
            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }
            
            $sql .= $line;
            
            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';

                 echo "<script>window.location = 'admin.php?db_restored';</script>";
            
            }
        } // end foreach
        
    } // end if file exists
    return $response;
}
restoreMysqlDB($fileTmpName,$conn);
?>