<?php 
    include 'variables.php';
    $conn=mysqli_connect($HostName,$DBUser,$DBPassword,$DatabaseName);
    if(!$conn)
        echo"NOT CONNECTED".mysqli_connect_error($conn);
?>